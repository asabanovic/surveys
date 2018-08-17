<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSurveyAnswersTableGroupMorph extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_answers', function (Blueprint $table) {
            // Organization/Group the creator belongs to
            $table->string('group_type')->nullable()->after('creator_id');
            $table->integer('group_id')->unsigned()->nullable()->after('group_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // if (Schema::hasColumn('survey_answers', 'group_id')) {
        //     Schema::table('survey_answers', function (Blueprint $table) {
        //         $table->dropColumn('group_id');
        //         $table->dropColumn('group_type');
        //     });
        // }
    }
}
