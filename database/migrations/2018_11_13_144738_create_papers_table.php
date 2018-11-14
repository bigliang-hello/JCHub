<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('试卷名称');
            $table->integer('type_1_per_score')->nullable()->comment('选择题每题分值');
            $table->integer('type_2_per_score')->nullable()->comment('判断题每题分值');
            $table->integer('type_3_per_score')->nullable()->comment('填空题每题分值');
            $table->integer('type_4_per_score')->nullable()->comment('问答题每题分值');
            $table->integer('total_score')->nullable()->comment('满分');
            $table->integer('user_id')->comment("创建者id");
            $table->integer('subject_id')->comment("学科id");
            $table->timestamps();
        });

        Schema::create('paper_question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paper_id')->comment("试卷id");
            $table->integer('question_id')->comment("问题id");
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
        Schema::dropIfExists('papers');
        Schema::dropIfExists('paper_question');
    }
}
