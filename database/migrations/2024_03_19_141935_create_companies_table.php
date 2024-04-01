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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70);
            $table->string('website', 70)->nullable();
            $table->string('fax', 70)->nullable();
            $table->string('converted', 70)->nullable();
            $table->foreignId('assign_by')->references('id')->on('users')->nullable();
            $table->foreignId('create_user_id')->references('id')->on('users')->nullable();
            $table->foreignId('assign_to')->references('id')->on('users')->nullable();
            $table->foreignId('assign')->references('id')->on('assigns');
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
        Schema::dropIfExists('companies');
    }
};
