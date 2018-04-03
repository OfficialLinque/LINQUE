<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {            
            $table->integer('sellerid')->unsigned()->change();
            $table->foreign('sellerid')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');       
            $table->integer('prodtype')->unsigned()->change();
            $table->foreign('prodtype')
                ->references('id')
                ->on('producttypes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['sellerid']);
            $table->dropForeign(['prodtype']);
        });
    }
}
