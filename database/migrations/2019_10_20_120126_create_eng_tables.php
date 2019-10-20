<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineers', function (Blueprint $table) {
            $table->bigIncrements('eng_id');
            $table->string('eng_title', 255)->comment('The name of the engineer ie Double Queen, etc.');
            $table->string('eng_phonenumber', 255)->comment('The phone number of the engineer ie 07989976754 etc.');
            $table->string('eng_email', 255)->comment('The email of the engineer ie queensrepair@gmail.com etc.');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('service_types', function (Blueprint $table) {
            $table->bigIncrements('service_type_id');
            $table->string('service_type', 255)->comment('The name of the engineer service type, ie Appliance, Boiler, Home Emergency etc.');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('engineer_service_types', function (Blueprint $table) {
            $table->bigIncrements('eng_service_type_id');
            $table->unsignedBigInteger('eng_id')->comment('The corresponding engineer.');
            $table->unsignedBigInteger('service_type_id')->index('service_type_id')->comment('The corresponding engineering services.');
            $table->timestamps();
            $table->foreign('eng_id')->references('eng_id')->on('engineers');
            $table->foreign('service_type_id')->references('service_type_id')->on('service_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('engineer_service_types');
        Schema::dropIfExists('engineers');
        Schema::dropIfExists('service_types');
    }
}
