<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 30.12.2016
 * Time: 12:07
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException {

    public static $defaultTemplates = [
        self::MODE_DEFAULT=>[
            self::STANDARD=>'E-mail уже занят'
        ]
    ];

}