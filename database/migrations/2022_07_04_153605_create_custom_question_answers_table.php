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
        Schema::create('custom_question_answers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedBigInteger('qus_id');
            $table->foreign('qus_id')->references('id')->on('custom_questions');
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
        Schema::dropIfExists('custom_question_answers');
    }
};
