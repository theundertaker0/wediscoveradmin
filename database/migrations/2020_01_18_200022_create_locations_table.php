<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',500);
            $table->string('short_description',500);
            $table->bigInteger('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states');
            $table->text('description')->nullable();
            $table->text('biodiversity')->nullable();
            $table->text('environmental')->nullable();
            $table->text('culture')->nullable();
            $table->text('archeology')->nullable();
            $table->text('history')->nullable();
            $table->text('economy')->nullable();
            $table->text('sustainable_development')->nullable();
            $table->text('demography')->nullable();
            $table->text('gastronomy')->nullable();
            $table->string('ext1',200)->nullable();
            $table->string('ext2',200)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
