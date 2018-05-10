<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSurveyQuestionPlaceholderDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->string('placeholder')->nullable()->after('question'); 
            $table->text('description')->nullable()->after('question');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_questions', function(Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('placeholder');
        });
    }
}
