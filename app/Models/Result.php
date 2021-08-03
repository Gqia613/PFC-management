<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','first_day','last_day', 'diet_term', 'goal_weight','meals_number','lost_calorie','intake_calorie', 'need_protein', 'need_fat','need_carbohydrate','age','gender', 'height', 'weight','active_flg','exercise','del_flg'];	
}
