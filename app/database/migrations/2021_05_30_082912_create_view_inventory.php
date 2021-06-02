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
        $this->createView();
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

    private function createView(): string
    {
        return <<<SQL
            CREATE OR REPLACE VIEW view_inventory AS
                SELECT it.name, it.quantity, iv.level , iv.shelf
                FROM items AS it, inventory AS iv
                WHERE it.id = iv.item_id
            SQL;
    }

    private function dropView(): string
    {
        return <<<SQL

            DROP VIEW IF EXISTS `view_inventory`;
            SQL;
    }
}
