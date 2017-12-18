<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_contacts', function (Blueprint $table) {
            $table->increments('id');

            // If there is an existing contact object, tie it to this survey contact 
            $table->string('contact_type')->nullable();
            $table->integer('contact_id')->unsigned()->nullable();

            // Survey this contact belongs to
            $table->integer('survey_id')->unsigned()->index();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');

            // Creator of the question
            $table->string('creator_type')->nullable();
            $table->integer('creator_id')->unsigned()->nullable();

            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');

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
        Schema::dropIfExists('survey_contacts');
    }
}
