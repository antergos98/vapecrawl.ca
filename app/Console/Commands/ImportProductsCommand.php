<?php

namespace App\Console\Commands;

use App\Product;
use App\Vendor;
use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Artisan;
use Laravel\Scout\Console\FlushCommand;
use Laravel\Scout\Console\ImportCommand;

class ImportProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        file_put_contents(storage_path('import.txt'), '');

        try {
            Product::truncate();

            Vendor::all()->each(function(Vendor $vendor) {
                $this->info('Starting to fetch products from ' . $vendor->name);
                $class = "App\\Importer\\" . $vendor->class_name;
                $importer = new $class($vendor);
                $importer->import();
            });

            Artisan::call(FlushCommand::class, ['model' => Product::class]);
            Artisan::call(ImportCommand::class, ['model' => Product::class]);

            @unlink(storage_path('import.txt'));
        } catch (\Exception $e) {
            @unlink(storage_path('import.txt'));
        }
    }
}
