<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSurveyQuestionsRelatedQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->integer('related_question_id')->unsigned()->index()->nullable()->after('creator_id');
            $table->foreign('related_question_id')->references('id')->on('survey_questions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->dropForeign(['related_question_id']);
            $table->dropColumn('related_question_id');
        });
    }
}
