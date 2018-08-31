<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSurveyQuestionWithPdfDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->text('pdf_description')->nullable();
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
                $table->dropColumn('pdf_description');
            });
        }
    }
}
