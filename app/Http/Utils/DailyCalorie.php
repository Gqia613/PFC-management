<?php

namespace App\Http\Utils;

class DailyCalorie
{
    /**
     * 1日の消費カロリー計算
     * 
     * @param string $gender 性別
     * @param float $weight 体重
     * @param float $height 身長
     * @param int $age 年齢
     * @param float $exercise 運動量
     */
    public static function daily_calories_burned(string $gender, float $weight, float $height, int $age, float $exercise){
        if($gender == 'man'){
            $basal_metabolism = (13.397 * $weight) + (4.799 * $height) - (5.677 * $age) + 88.362;
        }elseif($gender == 'woman') {
            $basal_metabolism = (9.247 * $weight) + (3.098 * $height) - (4.33 * $age) + 447.593;
        }

        $calorie = $basal_metabolism * $exercise;

        return $calorie;
    }
}