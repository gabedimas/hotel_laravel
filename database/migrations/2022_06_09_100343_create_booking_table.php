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
        // untuk booking
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('kamar_id');
            $table->string('status');
            $table->datetime('tanggal_awal');
            $table->datetime('tanggal_akhir');
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
        Schema::dropIfExists('booking');
    }
};
