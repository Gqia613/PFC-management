<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physique extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','age','gender', 'height', 'weight'];

    public static $rules = array(
        'gender' => 'required',
        'age' => 'required|min:10|numeric',
        'height' => 'required|min:10|numeric',
        'weight' => 'required|min:10|numeric',
    );

    public static $messages = array(
        'gender.required' => '*性別は必須です',
        'age.required'  => '*性別は必須です',
        'age.min'  => '*年齢は0以上の数値を入力してください',
        'age.numeric'  => '*年齢は数値を入力してください',
        'height.required'  => '*身長は必須です',
        'height.min'  => '*身長は0以上の数値を入力してください',
        'height.numeric'  => '*身長は数値を入力してください',
        'weight.required'  => '*体重は必須です',
        'weight.min'  => '*体重は0以上の数値を入力してください',
        'weight.numeric'  => '*体重は数値を入力してください',
    );
}
