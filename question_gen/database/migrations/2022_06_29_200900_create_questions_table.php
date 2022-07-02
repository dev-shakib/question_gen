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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('ques_type');
            $table->text('question');
            $table->text('subject');
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('class');
            $table->foreign('class')->references('id')->on('class');
            $table->unsignedBigInteger('institute');
            $table->foreign('institute')->references('id')->on('institute');
            $table->unsignedBigInteger('board');
            $table->foreign('board')->references('id')->on('board');
            $table->unsignedBigInteger('ques_year');
            $table->foreign('ques_year')->references('id')->on('question_year');
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
};
