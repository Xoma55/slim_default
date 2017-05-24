<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 30.12.2016
 * Time: 11:57
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule {

    public function validate($input) {

        return User::where('email',$input)->count()===0;
    }


}