<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable();
            $table->string('title');
            $table->text('description');

            $table->text('privacy')->nullable();
            $table->text('support')->nullable();
            
            // Creator of the survey
            $table->string('creator_type')->nullable();
            $table->integer('creator_id')->unsigned()->nullable();

            $table->date('start')->nullable();
            $table->date('end')->nullable();

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
        Schema::dropIfExists('surveys');
    }
}
