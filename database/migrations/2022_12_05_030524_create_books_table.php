<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Buku/Book:
     * @return void
     */
    // -> id: char(13), PK
    //    -> judul: varchar(255)
    //    -> halaman: int(5)
    //    -> kategori: varchar(255)
    //    -> penerbit: varchar(255)

    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->char('id',13)->primary();
            $table->string('judul',255);
            $table->smallInteger('halaman');
            $table->string('kategori',255);
            $table->string('penerbit',255);
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
        Schema::dropIfExists('books');
    }
}
