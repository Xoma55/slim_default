<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 29.12.2016
 * Time: 18:49
 */

namespace App\Middleware;

class ValidationErrorsMiddleware extends Middleware {

    public function __invoke($request,$response,$next) {

        $errArray=isset($_SESSION['errors'])?$_SESSION['errors']:null;
        $this->container->view->getEnvironment()->addGlobal('errors',$errArray);
        unset($_SESSION['errors']);


        $response=$next($request,$response);
        return $response;
    }

}