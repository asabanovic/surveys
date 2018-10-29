<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyInvitations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_invitations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('invitation_id')->unsigned()->index();
            $table->foreign('invitation_id')->references('id')->on('invitations')->onDelete('cascade');

            $table->integer('survey_id')->unsigned()->index();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');

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
            Schema::dropIfExists('survey_invitations');
        }
    }
}
