<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 29.12.2016
 * Time: 13:01
 */

use Respect\Validation\Validator as v;

session_start();

require __DIR__.'/../vendor/autoload.php';

$sqliteDb=__DIR__.'/../data/db1.db';

$app=new \Slim\App([

    'settings'=> [
        'displayErrorDetails'=>true,
        'addContentLengthHeader' => false,
        'db'=>[
            'driver'=>'sqlite',
            'database'=>$sqliteDb
        ],
    ],

]);

$container=$app->getContainer();

$capsule=new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db']=function ($container) use ($capsule) {

    return $capsule;
};

$container['auth']=function ($container) {
    return new \App\Auth\Auth;
};

$container['flash']=function ($container) {

    return new \Slim\Flash\Messages();
};

$container['view']=function ($container) {

    $view=new \Slim\Views\Twig(__DIR__.'/../resources/views',[
        'cache'=>false,
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    $view->getEnvironment()->addGlobal('auth',[
        'check'=>$container->auth->check(),
        'user'=>$container->auth->user()
    ]);

//    var_dump($container->flash); die();
    $view->getEnvironment()->addGlobal('flash',$container->flash);

    return $view;
};


$container['validator']=function($container) {

    return new App\Validation\Validator;
};

$container['HomeController']=function($container) {

    return new \App\Controllers\HomeController($container);
};

$container['MainController']=function($container) {

    return new \App\Controllers\MainController($container);
};

$container['AuthController']=function($container) {

    return new \App\Controllers\Auth\AuthController($container);
};

$container['PasswordController']=function($container) {

    return new \App\Controllers\Auth\PasswordController($container);
};


$container['csrf']=function ($container) {
    return new \Slim\Csrf\Guard;
};



$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \App\Middleware\OldInputMiddleware($container));
$app->add(new \App\Middleware\CsrfViewMidleware($container));
$app->add($container->csrf);


v::with('App\\Validation\\Rules\\');

require __DIR__.'/../app/routes.php';