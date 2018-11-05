<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->comment("类型，1：选择 2：判断 3.填空 4.问答");
            $table->string('title')->comment("昵称");
            $table->string('option_a')->nullable()->comment("选项A");
            $table->string('option_b')->nullable()->comment("选项B");
            $table->string('option_c')->nullable()->comment("选项C");
            $table->string('option_d')->nullable()->comment("选项D");
            $table->string('answer')->comment("答案");
            $table->integer('user_id')->comment("创建者id");
            $table->integer('subject_id')->comment("学科id");
            $table->string('analysis')->nullable()->comment("解析");
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
        Schema::dropIfExists('questions');
    }
}
