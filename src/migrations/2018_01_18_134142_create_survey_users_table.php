<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('survey_id')->unsigned()->index();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');

            $table->boolean('completed')->nullable();

            $table->morphs('user');

            $table->unique(['survey_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_users');
    }
}
