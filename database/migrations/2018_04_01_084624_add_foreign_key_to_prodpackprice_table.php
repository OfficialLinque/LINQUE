<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToProdpackpriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prodpackprice', function (Blueprint $table) {
            $table->renameColumn('prodid', 'id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('prodid')
                ->on('products')
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
        Schema::table('prodpackprice', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
    }
}
