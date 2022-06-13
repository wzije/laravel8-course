<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleaseDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('release_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kind_id');
            $table->date('date');
            $table->timestamps();

            $table->foreign("kind_id")->references('id')->on('kinds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('release_dates');
    }
}
