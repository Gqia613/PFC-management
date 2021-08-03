<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Utils\DailyCalorie;
use lluminate\Http\DateTime;
use Illuminate\Support\Facades\Auth;
use App\Models\Result;

class TopController extends Controller
{
    public function index() {
        return view('top');
    }

    public function home() {
        return view('home');
    }

    public function calculation(Request $request) {
        define('LOSE_CALORIES', 7000);
        // 1gあたりのカロリー
        define('PROTEIN_PER_GRAM', 4);
        define('FAT_PER_GRAM', 9);
        define('CARBOHYDRATE_PER_GRAM', 4);
        // PFCの割合
        define('PROTEIN_PERCENTAGE', 45);
        define('FAT_PERCENTAGE', 5);
        define('CARBOHYDRATE_PERCENTAGE', 55);

        $weight = $request->weight;
        $height = $request->height;
        $gender = $request->gender;
        $age = $request->age;
        $first_day = $request->first_day;
        $last_day = $request->last_day;
        $goal_weight = $request->goal_weight;
        $exercise = $request->exercise;

        $data = [];

        // 指定された期間の日数を求める
        date_default_timezone_set('Asia/Tokyo');
        $start = strtotime($first_day);
        $end = strtotime($last_day);
        $useDays = ($end - $start) / (60 * 60 * 24);
        //////////////////////////////

        // 目標体重のために何キロ落とす必要があるかを求める
        $need_weight_burned = $weight - $goal_weight;
        // 単純計算で目標体重までに消費する必要のあるカロリーを求める
        $need_calories_burned = $need_weight_burned * LOSE_CALORIES;

        // 1日に何kcal消費カロリーを摂取カロリーより超える必要があるか求める
        $need_day_calories_burned = $need_calories_burned / $useDays;

        // 1日の消費カロリーを求める
        $lost_calorie = DailyCalorie::daily_calories_burned($gender, $weight, $height, $age, $exercise);

        // 期間までに目標体重になるように1日の摂取カロリーを求める
        $intake_calorie = $lost_calorie - $need_day_calories_burned;

        $protein_of_1day = ($intake_calorie * (PROTEIN_PERCENTAGE / 100)) / PROTEIN_PER_GRAM;
        $fat_of_1day = ($intake_calorie * (FAT_PERCENTAGE / 100)) / FAT_PER_GRAM;
        $carbohydrate_of_1day = ($intake_calorie * (CARBOHYDRATE_PERCENTAGE / 100)) / CARBOHYDRATE_PER_GRAM;


        $data['date'] = $useDays;
        $data['gender'] = $gender;
        $data['age'] = $age;
        $data['weight'] = $weight;
        $data['height'] = $height;
        $data['first_day'] = $first_day;
        $data['last_day'] = $last_day;
        $data['lost_calorie'] = $lost_calorie;
        $data['intake_calorie'] = $intake_calorie;
        $data['goal_weight'] = $goal_weight;
        $data['protein_of_1day'] = round($protein_of_1day, 2);
        $data['fat_of_1day'] = round($fat_of_1day, 2);
        $data['carbohydrate_of_1day'] = round($carbohydrate_of_1day, 2);

        return $data;
    }

    public function insResult(Request $request)
    {
        $user_physique = new Result;
        $form = $request->all();
        unset($form['_token']);
        $user_physique->fill($form)->save();

        return ['msg' => '保存しました。'];
    }
}
