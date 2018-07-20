<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->double('quantity');
            $table->dateTime('borrow_date');
            $table->dateTime('return_date');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('book_borrow', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('borrow_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('book_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
        Schema::dropIfExists('book_borrow');
    }
}
