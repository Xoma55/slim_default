<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 30.12.2016
 * Time: 12:36
 */

namespace app\Middleware;


class CsrfViewMidleware extends Middleware {

    public function __invoke($request,$response,$next) {


        $this->container->view->getEnvironment()->addGlobal('csrf',[

            'field'=>'
                <input type="hidden" name="'.$this->container->csrf->getTokenNameKey().'" value="'.$this->container->csrf->getTokenName().'">
                <input type="hidden" name="'.$this->container->csrf->getTokenValueKey().'" value="'.$this->container->csrf->getTokenValue().'">
            ',

        ]);

        $response=$next($request,$response);
        return $response;

    }


}