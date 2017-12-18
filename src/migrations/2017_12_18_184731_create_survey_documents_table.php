<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->text('path')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->integer('size')->nullable();

            // Survey this answer belongs to
            $table->integer('survey_id')->unsigned()->index();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');

            // Who uploaded the document
            $table->string('owner_type')->nullable();
            $table->integer('owner_id')->unsigned()->nullable();

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
        Schema::dropIfExists('survey_documents');
    }
}
