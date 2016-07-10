<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','CONT_ACC','phone'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static $login_validation_rules = [
        'email' => 'required|email|exists:users',
        'password' => 'required|min:8'
    ];

    public static $register_validation_rules = [
        'name' => 'required',
        'lname' => 'required',
        'email' => 'required|email|Unique:users',
        'password' => 'required|min:8',
        'password_confirmation' => 'required',
        'CONT_ACC' => 'required|Unique:users|AlphaNum',
        'phone' => 'required|Unique:users|max:10'
    ];

    public static $info_update_rules = [
        'name' => 'required',
        'phone' => 'required|max:10'
    ];

    public static $changepassword_rules = [
        'password1' => 'required',
        'password2' => 'required|min:8',
        'password3' => 'required|min:8'
    ];
}
