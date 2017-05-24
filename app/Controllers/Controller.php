<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 29.12.2016
 * Time: 13:41
 */

namespace App\Controllers;

class Controller {

    protected $container;

    public function __construct($container) {

        $this->container=$container;
    }

    public function __get($property) {

        if($this->container->{$property}) {
            return $this->container->{$property};
        }
    }

}