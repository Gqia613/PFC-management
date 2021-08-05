<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','first_day','last_day', 'diet_term', 'goal_weight','meals_number','lost_calorie','intake_calorie', 'need_protein', 'need_fat','need_carbohydrate','age','gender', 'height', 'weight','active_flg','exercise','del_flg'];

    public static $rules = array(
        'user_id' => 'required|numeric',
        'first_day' => 'required|date',
        'last_day' => 'required|date',
        'diet_term' => 'required|numeric',
        'goal_weight' => 'required|numeric',
        'meals_number' => 'required|numeric',
        'lost_calorie' => 'required|numeric',
        'intake_calorie' => 'required|numeric',
        'need_protein' => 'required|numeric',
        'need_fat' => 'required|numeric',
        'need_carbohydrate' => 'required|numeric',
        'age' => 'required|min:10|numeric',
        'gender' => 'required',
        'height' => 'required|min:10|numeric',
        'weight' => 'required|min:10|numeric',
        'exercise' => 'required',
    );

    public static $messages = array(
        'user_id.required' => '*ユーザーIDは必須です',
        'user_id.numeric' => '*ユーザーIDは数値を入力してください',
        'first_day.required' => '*開始日は必須です',
        'first_day.date' => '*開始日はXXXX-XX-XXの形式で入力してください',
        'last_day.required' => '*終了日は必須です',
        'last_day.date' => '*終了日はXXXX-XX-XXの形式で入力してください',
        'diet_term.required' => '*期間は必須です',
        'diet_term.numeric' => '*期間は数値を入力してください',
        'goal_weight.required' => '*目標体重は必須です',
        'goal_weight.numeric' => '*目標体重は数値を入力してください',
        'meals_number.required' => '*食事回数は必須です',
        'meals_number.numeric' => '*食事回数は数値を入力してください',
        'lost_calorie.required' => '*消費カロリーは必須です',
        'lost_calorie.numeric' => '*消費カロリーは数値を入力してください',
        'intake_calorie.required' => '*摂取カロリーは必須です',
        'intake_calorie.numeric' => '*摂取カロリーは数値を入力してください',
        'need_protein.required' => '*1日に必要なタンパク質は必須です',
        'need_protein.numeric' => '*1日に必要なタンパク質は数値を入力してください',
        'need_fat.required' => '*1日に必要な脂質は必須です',
        'need_fat.numeric' => '*1日に必要な脂質は数値を入力してください',
        'need_carbohydrate.required' => '*1日に必要な炭水化物は必須です',
        'need_carbohydrate.numeric' => '*1日に必要な炭水化物は数値を入力してください',
        'gender.required' => '*性別は必須です',
        'age.required'  => '*年齢は必須です',
        'age.min'  => '*年齢は0以上の数値を入力してください',
        'age.numeric'  => '*年齢は数値を入力してください',
        'height.required'  => '*身長は必須です',
        'height.min'  => '*身長は0以上の数値を入力してください',
        'height.numeric'  => '*身長は数値を入力してください',
        'weight.required'  => '*体重は必須です',
        'weight.min'  => '*体重は0以上の数値を入力してください',
        'weight.numeric'  => '*体重は数値を入力してください',
        'exercise.required' => '*運動量は必須です',
    );
}
