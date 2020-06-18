<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $vendors = factory(Vendor::class, 5)->create();

        foreach($vendors as $vendor) {
            factory(Product::class, 20)->create(['vendor_id' => $vendor]);
            factory(Coupon::class)->create(['description' => "'reddit' for 10% off",'vendor_id' => $vendor]);
        }

        factory(User::class)->create([
            'name' => 'Vincent Bergeron',
            'email' => "info@vapecrawl.ca",
            'password' => bcrypt('password')
        ]);
    }
}
