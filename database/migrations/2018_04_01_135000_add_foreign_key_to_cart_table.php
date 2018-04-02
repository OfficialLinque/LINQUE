<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {                        
            $table->integer('buyerid')->unsigned()->change();
            $table->foreign('buyerid')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');                    
            $table->integer('prodpackid')->unsigned()->change();
            $table->foreign('prodpackid')
                ->references('id')
                ->on('prodpackprice')
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
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['buyerid']);
            $table->dropForeign(['prodpackid']);
        });
    }
}
