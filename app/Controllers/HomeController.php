<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 29.12.2016
 * Time: 13:30
 */

namespace App\Controllers;


class HomeController extends Controller {

    public function index($request,$response) {

        return $this->view->render($response,'home.twig');
    }

}