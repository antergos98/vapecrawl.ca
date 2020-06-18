<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUselessColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendors', function(Blueprint $table) {
            $table->dropColumn('extractor_type');
            $table->dropColumn('enabled');
            $table->dropColumn('products_refreshed_at');
        });

        Schema::table('products', function(Blueprint $table) {
            $table->dropColumn('identifier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
