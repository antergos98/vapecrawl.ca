<?php

namespace Tests\Feature;

use App\Coupon;
use App\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VendorsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_a_list_of_vendors()
    {
        $vendor = factory(Vendor::class)->create();

        $this->get('/vendors')
            ->assertStatus(200)
            ->assertSeeText($vendor->name);
    }

    /** @test */
    public function active_coupons_are_displayed()
    {
        $vendor = factory(Vendor::class)->create();
        $coupon = factory(Coupon::class)->create([
            'vendor_id' => $vendor->id,
            'expires_at' => now()->addDay()
        ]);

        $this->get('/vendors')
            ->assertSeeText($coupon->description);
    }

    /** @test */
    public function expired_coupons_are_not_displayed()
    {
        $vendor = factory(Vendor::class)->create();
        $coupon = factory(Coupon::class)->create([
            'vendor_id' => $vendor->id,
            'expires_at' => now()->subDay()
        ]);

        $this->get('/vendors')
            ->assertDontSeeText($coupon->description);
    }
}
