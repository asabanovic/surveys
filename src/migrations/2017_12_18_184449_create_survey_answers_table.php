<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->increments('id');

            $table->text('answer')->nullable();

            // Who answered the question
            $table->string('creator_type')->nullable();
            $table->integer('creator_id')->unsigned()->nullable();

            // Survey this answer belongs to
            $table->integer('survey_id')->unsigned()->index()->nullable();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');

            // Question this answer belongs to
            $table->integer('question_id')->unsigned()->index()->nullable();
            $table->foreign('question_id')->references('id')->on('survey_questions')->onDelete('cascade');

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
        Schema::dropIfExists('survey_answers');
    }
}
