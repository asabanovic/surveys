<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSurveyQuestionConditionDataFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->string('condition')->nullable()->after('question'); 
            $table->text('data')->nullable()->after('condition');
            $table->text('children')->nullable()->after('data'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('survey_questions', function($table) {
        //     $table->dropColumn('condition');
        //     $table->dropColumn('data');
        //     $table->dropColumn('children');
        // });
    }
}
