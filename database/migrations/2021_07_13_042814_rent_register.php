<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RentRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_register', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('born');
            $table->string('email');
            $table->integer('rent_period');
            $table->string('data');
            $table->string('phone');
            $table->string('parent_name')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('parent_relation')->nullable();
            $table->tinyInteger('progress')->default(0);
            $table->timestamps();
        });

        Schema::table('rent_register', function (Blueprint $table) {
            $table->tinyInteger('progress')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_register');
    }
}
