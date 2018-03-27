<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForgetPasswordToken extends Model
{
    protected $table = 'forget_password_token';

    protected $fillable = [ 'email', 'token' ];
}
