<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 29.12.2016
 * Time: 17:25
 */

namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator {

    protected $errors;

    public function validate($request, array $rules) {

        foreach ($rules as $field=>$rule) {

           try {
               $rule->setName($field)->assert($request->getParam($field));
           } catch (NestedValidationException $e) {
               $this->errors[$field]=$e->getMessages();
           }
        }

        $_SESSION['errors']=$this->errors;

        return $this;

    }

    public function failed() {

        return !empty($this->errors);
    }

}