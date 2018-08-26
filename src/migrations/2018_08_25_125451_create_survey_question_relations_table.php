<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->dropForeign(['related_question_id']);
            $table->dropColumn('related_question_id');
        });

        Schema::create('survey_question_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_question_id')->unsigned()->index();
            $table->foreign('parent_question_id')->references('id')->on('survey_questions')->onDelete('cascade');

            $table->integer('related_question_id')->unsigned()->index();
            $table->foreign('related_question_id')->references('id')->on('survey_questions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Config::get('database.default') === 'mysql') {

            Schema::table('survey_questions', function (Blueprint $table) {
                $table->integer('related_question_id')->unsigned()->index()->nullable()->after('creator_id');
                $table->foreign('related_question_id')->references('id')->on('survey_questions')->onDelete('set null');
            });

            Schema::dropIfExists('survey_question_relations');
        }

        
    }
}
