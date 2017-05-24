<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 01.01.2017
 * Time: 14:09
 */

namespace app\Middleware;


class AuthMiddleware extends Middleware {

    public function __invoke($request,$response,$next) {

        if(!$this->container->auth->check()) {
            $this->container->flash->addMessage('error','Для выполнения этого действия необходимо зарегистрироваться.');
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }

        $response=$next($request,$response);
        return $response;
    }

}