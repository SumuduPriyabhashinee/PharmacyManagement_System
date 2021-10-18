<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
        CREATE TRIGGER items_update_on_order AFTER INSERT ON `orders` FOR EACH ROW
            BEGIN
                UPDATE items
                SET amount = amount - New.quantity
                WHERE id = New.item_id
                ;
            END
        ');

        // DB::unprepared('
        // CREATE TRIGGER items_update_on_order AFTER UPDATE ON `orders` FOR EACH ROW
        //     BEGIN
        //     IF

        //     END IF
        //         UPDATE items
        //         SET amount = amount - New.quantity
        //         WHERE id = New.item_id
        //         ;
        //     END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `items_update_on_order`');
    }

    

}
