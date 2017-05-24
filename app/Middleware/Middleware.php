<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 29.12.2016
 * Time: 18:45
 */

namespace App\Middleware;

class Middleware {

    protected $container;

    public function __construct($container) {

        $this->container=$container;
    }

}