<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateViewInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->createView());
        // $this->createView();
    }

    public function createView(): string
    {
        return <<< SQL
        CREATE OR REPLACE VIEW view_inventory AS
                SELECT it.name, it.quantity, iv.level ,iv.shelf, iv.date_in, iv.date_out
                FROM items AS it, inventory AS iv
                WHERE it.id = iv.item_id
        SQL;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->dropView();
    }

    private function dropView(): string
    {
        return <<<SQL

            DROP VIEW IF EXISTS `view_inventory`;
            SQL;
    }
}
