<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER borrows_log AFTER INSERT ON `borrows` FOR EACH ROW
            BEGIN
                INSERT INTO borrows_log (`quantity`, `borrow_date`, `return_date`,`borrow_id`, `created_at`, `updated_at`) 
                VALUES (new.quantity, new.borrow_date, new.return_date, new.id, new.created_at, new.updated_at);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `borrows_log`');
    }
}
