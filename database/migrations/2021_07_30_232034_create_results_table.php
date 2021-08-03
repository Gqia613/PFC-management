<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('first_day');
            $table->date('last_day');
            $table->integer('diet_term');
            $table->double('goal_weight', 5, 1);
            $table->double('exercise', 4, 3);
            $table->integer('meals_number');
            $table->integer('lost_calorie');
            $table->integer('intake_calorie');
            $table->double('need_protein', 6, 2);
            $table->double('need_fat', 6, 2);
            $table->double('need_carbohydrate', 6, 2);
            $table->integer('age');
            $table->string('gender');
            $table->double('height', 5, 1);
            $table->double('weight', 5, 1);
            $table->boolean('active_flg')->default(false);
            $table->boolean('del_flg')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
