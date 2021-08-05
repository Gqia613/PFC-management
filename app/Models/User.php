<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = array(
        'name' => 'required|unique:users|',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    );

    public static $messages = array(
        'name.required' => '*ユーザー名は必須です',
        'name.unique'  => '*そのユーザー名はすでに登録されています',
        'email.required'  => '*メールアドレスは必須です',
        'email.email'  => '*メールアドレスの形式で入力してください',
        'email.unique'  => '*そのメールアドレスはすでに登録されています',
        'password.required'  => '*パスワードは必須です',
        'password.min'  => '*パスワードは6文字以上で設定してください',
        'password.confirmed'  => '*パスワードと確認用パスワードが異なってます',
    );
}
