<?php

use App\Models\Vendor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameImporterToExtractorType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->renameColumn('importer', 'extractor_type');

            Vendor::all()->each(function(Vendor $vendor) {
                $vendor->importer = Str::of($vendor->importer)
                    ->replace('App\\Importers\\', '')
                    ->replace('Importer', '');
                $vendor->save();
            });
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
            $table->renameColumn('extractor_type', 'importer');
        });
    }
}
