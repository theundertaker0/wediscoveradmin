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
            $table->text('description')->nullable();
            $table->text('biosecurity')->nullable();
            $table->text('weather')->nullable();
            $table->text('police_number',20)->nullable();
            $table->string('firemen_number',20)->nullable();
            $table->string('medical_number',20)->nullable();
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
