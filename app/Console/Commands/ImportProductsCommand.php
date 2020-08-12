<?php

namespace App\Console\Commands;

use App\Product;
use App\Vendor;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
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
        Product::truncate();

        Vendor::enabled()->get()->each(function(Vendor $vendor) {
            try {
                $this->info('Starting to fetch products from ' . $vendor->name);
                $class = "App\\Importer\\" . $vendor->class_name;
                $importer = new $class($vendor);
                $importer->import();
            } catch (Exception $e) {
                // If there's any error with the import, disable the vendor and delete it's products
                Log::channel('larabug')->error($e->getMessage());
                $vendor->update(['enabled' => false]);
                $vendor->products()->delete();
            }
        });

        Artisan::call(FlushCommand::class, ['model' => Product::class]);
        Artisan::call(ImportCommand::class, ['model' => Product::class]);
    }
}
