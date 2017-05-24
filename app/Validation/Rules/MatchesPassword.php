<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 31.12.2016
 * Time: 14:18
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class MatchesPassword extends AbstractRule {

    protected $password;

    public function __construct($password) {

        $this->password=$password;
    }

    public function validate($input) {

        return password_verify($input,$this->password);
    }

}
