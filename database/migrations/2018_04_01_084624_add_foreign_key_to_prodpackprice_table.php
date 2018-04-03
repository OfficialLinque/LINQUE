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
            $table->integer('prodid')->unsigned()->change();
            $table->foreign('prodid')
                ->references('id')
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
            $table->dropForeign(['prodid']);
        });
    }
}
