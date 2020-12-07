<?php

namespace App\Console\Commands;

use App\Models\Coupon;
use Illuminate\Console\Command;

class DestroyExpiredCoupons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'destroy:expired:coupons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Destroys expired coupons';

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
     */
    public function handle(): void
    {
        $coupons = Coupon::where('expires_at', '<', now())->get();
        Coupon::destroy($coupons->pluck('id'));
        $this->info("Destroyed " . count($coupons) . " coupons");
    }
}
