<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',200);
            $table->string('short_name',10)->nullable();
            $table->string('image',300);
            $table->longText('description')->nullable();
            $table->longText('biosecurity')->nullable();
            $table->longText('weather')->nullable();
            $table->string('police_number',20)->nullable();
            $table->string('firemen_number',20)->nullable();
            $table->string('medical_number',20)->nullable();
            $table->string('government_number',20)->nullable();
            $table->string('lat',150);
            $table->string('lng',150);
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
        Schema::dropIfExists('states');
    }
}
