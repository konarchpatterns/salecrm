<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('country_id')->references('id')->on('countries');
            $table->foreignId('state_id')->references('id')->on('states');
            $table->foreignId('city_id')->references('id')->on('cities')->nullable();
            $table->string('block')->nullable();
            $table->string('street')->nullable();
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('timezone')->nullable();
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
        Schema::dropIfExists('company_locations');
    }
};
