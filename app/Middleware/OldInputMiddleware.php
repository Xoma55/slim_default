<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 29.12.2016
 * Time: 20:23
 */

namespace App\Middleware;

class OldInputMiddleware extends Middleware {

    public function __invoke($request,$response,$next) {

        $oldArray=isset($_SESSION['old'])?$_SESSION['old']:null;
        $this->container->view->getEnvironment()->addGlobal('old',$oldArray);
        $_SESSION['old']=$request->getParams();

        $response = $next($request, $response);
        return $response;
    }
}