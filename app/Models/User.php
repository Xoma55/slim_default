<?php
/**
 * Created by PhpStorm.
 * User: Xoma55
 * Date: 29.12.2016
 * Time: 13:27
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table='users';

    protected $fillable=[
        'name',
        'email',
        'password'
    ];


    public function setPassword($password) {

        $this->update([
            'password'=>password_hash($password,PASSWORD_DEFAULT)
        ]);
    }

}
