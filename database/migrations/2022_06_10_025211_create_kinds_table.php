<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kinds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phone_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('phone_id')
                ->references('id')
                ->on('phones')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kinds');
    }
}
