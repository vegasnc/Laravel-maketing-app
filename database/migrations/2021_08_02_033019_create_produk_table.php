<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nama_produk');
            $table->integer('qty')->default(0);
            $table->string('jenis');
            $table->integer('bv')->default(0);
            $table->timestamps();
        });

        Schema::create('produk_details', function (Blueprint $table){
            $table->id();
            $table->foreignId('produk_id')
            ->references('id')
            ->on('produks')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('harga')->default(0);
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
        Schema::dropIfExists('members'); 
        Schema::dropIfExists('produks');
        Schema::dropIfExists('produk_details');   
    }
}
