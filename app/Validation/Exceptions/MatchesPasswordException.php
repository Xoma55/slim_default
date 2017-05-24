<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 31.12.2016
 * Time: 14:27
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class MatchesPasswordException extends ValidationException {

    public static $defaultTemplates = [
        self::MODE_DEFAULT=>[
            self::STANDARD=>'Пароль не совпадает с текущим.'
        ]
    ];

}