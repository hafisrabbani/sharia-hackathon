<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('deskripsi',255);
            $table->integer('pengguna_id');
            $table->string('image',255);
            $table->dateTime('end');
            $table->integer('status_verif')->nullable();
            $table->integer('status_tampil')->nullable();
            $table->integer('pengguna_win')->nullable();
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
        Schema::dropIfExists('bid');
    }
}
