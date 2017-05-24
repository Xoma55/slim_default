<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 01.01.2017
 * Time: 14:27
 */

namespace app\Middleware;


class GuestMiddleware extends Middleware {

    public function __invoke($request,$response,$next) {

        if($this->container->auth->check()) {
//            $this->container->flash->addMessage('error','Для выполнения этого действия необходимо зарегистрироваться.');
            return $response->withRedirect($this->container->router->pathFor('home'));
        }

        $response=$next($request,$response);
        return $response;
    }

}