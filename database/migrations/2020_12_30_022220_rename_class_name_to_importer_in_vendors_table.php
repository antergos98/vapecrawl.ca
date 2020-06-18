<?php

use App\Models\Vendor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameClassNameToImporterInVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            if (!app()->environment('testing')) {
                Vendor::all()->each(function (Vendor $vendor) {
                    $vendor->class_name = "App\\Importers\\" . $vendor->class_name;
                    $vendor->save();
                });
            }

            $table->renameColumn('class_name', 'importer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            if (!app()->environment('testing')) {
                Vendor::all()->each(function (Vendor $vendor) {
                    $vendor->importer = str_replace('App\\Importers\\', '', $vendor->importer);
                    $vendor->save();
                });
            }

            $table->renameColumn('importer', 'class_name');
        });
    }
}
