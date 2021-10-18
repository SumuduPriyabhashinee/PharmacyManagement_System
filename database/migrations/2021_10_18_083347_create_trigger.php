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
        //         New.quantity>(
        //             SELECT quantity from orders
        //             WHERE id = New.item_id
        //         )
        //         THEN
        //         UPDATE items
        //         SET amount = amount - (New.quantity-(
        //             SELECT quantity from orders
        //             WHERE id = New.item_id
        //         ))
        //         WHERE id = New.item_id
        //         ;
        //     END IF

        //     IF
        //         New.quantity<(
        //             SELECT quantity from orders
        //             WHERE id = New.item_id
        //         )
        //         THEN
        //         UPDATE items
        //         SET amount = amount - ((
        //             SELECT quantity from orders
        //             WHERE id = New.item_id
        //         )-New.quantity)
        //         WHERE id = New.item_id
        //         ;
        //     END IF

        //     END
        // ');

        DB::unprepared('
        CREATE TRIGGER items_delete_on_order AFTER DELETE ON `orders` FOR EACH ROW
            BEGIN
                UPDATE items
                SET amount = amount + Old.quantity
                WHERE id = Old.item_id
                ;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `items_update_on_order`');
    }

    

}
