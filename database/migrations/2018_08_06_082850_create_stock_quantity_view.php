<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockQuantityView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE VIEW stock_quantity AS 
        SELECT title, sum(borrows.quantity) as qty from book_borrow RIGHT JOIN borrows on borrows.id = book_borrow.borrow_id LEFT JOIN books on books.id = book_borrow.book_id GROUP by books.title
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `stock_quantity`');
    }
}
