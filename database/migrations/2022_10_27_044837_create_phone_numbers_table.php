<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('contact_id');
            // $table->foreign('contact_id')->references('id')->on('contacts');
            $table->string('number', 50)->nullable(false);
            $table->enum('type', ["Home", "Office", "Mobile", "Fax"])->default("Home");
            $table->enum('is_default', ["Y", "N"])->default("Y");
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
        Schema::dropIfExists('phone_numbers');
    }
}
