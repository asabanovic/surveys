<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotQuestionSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_survey', function (Blueprint $table) {
            $table->increments('id');

            // Survey this question belongs to
            $table->integer('survey_id')->unsigned()->index()->nullable();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');

            // Question that belongs to the survey
            $table->integer('question_id')->unsigned()->index()->nullable();
            $table->foreign('question_id')->references('id')->on('survey_questions')->onDelete('cascade');

            $table->unique(['question_id', 'survey_id']);
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
        Schema::dropIfExists('question_survey');
    }
}
