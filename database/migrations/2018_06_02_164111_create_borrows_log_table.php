<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows_log', function (Blueprint $table) {
            $table->increments('id');
            $table->double('quantity');
            $table->dateTime('borrow_date');
            $table->dateTime('return_date');
            $table->unsignedInteger('borrow_id');
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
        Schema::dropIfExists('borrows_log');
    }
}
