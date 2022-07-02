<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_question', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('class');
            $table->foreign('class')->references('id')->on('class');
            $table->integer('marks');
            $table->integer('ques_limit');
            $table->unsignedBigInteger('subject');
            $table->foreign('subject')->references('id')->on('subject');
            $table->integer('ques_type');
            $table->integer('exam_time');
            $table->text('instructions');
            $table->text("ques_ids");
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
        Schema::dropIfExists('generate_question');
    }
};
