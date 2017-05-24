<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 01.01.2017
 * Time: 14:45
 */

namespace App\Controllers;


class MainController extends Controller {

    public function start($request,$response) {

        return $this->view->render($response,'main.twig');
    }


}