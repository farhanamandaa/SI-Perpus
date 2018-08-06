<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOverallQuantityView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE VIEW overall_quantity AS 
        SELECT t.id, t.title, t.author, t.publisher, t.year, t.pages, t.quantity - COALESCE(v.qty, 0) quantity, c.category from books t left join stock_quantity v on t.title = v.title left join categories c on t.category_id = c.id
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW `overall_quantity`');
    }
}
