<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeVolunteerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_volunteer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('born');
            $table->string('email');
            $table->string('phone');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('period');
            $table->string('field');
            $table->string('intro');
            $table->string('city');
            $table->tinyInteger('progress')->default(0);
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
        Schema::dropIfExists('be_volunteer');
    }
}
