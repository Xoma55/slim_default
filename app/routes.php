<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 29.12.2016
 * Time: 13:08
 */

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->get('/','HomeController:index')->setName('home');
//$app->get('/','MainController:start')->setName('home');

$app->group('',function () {

    $this->get('/auth/signup','AuthController:getSignUp')->setName('auth.signup');
    $this->post('/auth/signup','AuthController:postSignUp');
    $this->get('/auth/signin','AuthController:getSignIn')->setName('auth.signin');
    $this->post('/auth/signin','AuthController:postSignIn');

})->add(new GuestMiddleware($container));

$app->group('',function () {

    $this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');
    $this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
    $this->post('/auth/password/change', 'PasswordController:postChangePassword');

})->add(new AuthMiddleware($container));
