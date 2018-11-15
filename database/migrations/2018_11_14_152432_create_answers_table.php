<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('score_id')->unsigned()->comment('答题试卷id');
            $table->foreign('score_id')->references('id')->on('scores');
            $table->integer('question_id')->unsigned()->comment('问题id');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->string('answer')->nullable()->comment('用户选择的答案');
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
        Schema::dropIfExists('answers');
    }
}
