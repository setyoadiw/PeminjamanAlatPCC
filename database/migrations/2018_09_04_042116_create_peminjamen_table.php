<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('namaktm');
            $table->string('email')->nullable();
            $table->string('hp');
            $table->string('ukm');
            $table->integer('alat_id')->unsigned();
            $table->string('tanggalkembali');
            $table->string('jumlah');
            $table->string('biaya');
            $table->string('staff');
            $table->boolean('kembali');
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
        Schema::dropIfExists('peminjamen');
    }
}
