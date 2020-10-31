<?php

namespace Tests\Unit;

use App\Coupon;
use App\Product;
use App\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class VendorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_products()
    {
        $vendor = factory(Vendor::class)->create();
        factory(Product::class, 5)->create(['vendor_id' => $vendor->id]);

        $this->assertCount(5, $vendor->products);
        $this->assertInstanceOf(Collection::class, $vendor->products);
    }

    /** @test */
    public function it_has_coupons()
    {
        $vendor = factory(Vendor::class)->create();
        factory(Coupon::class, 2)->create(['vendor_id' => $vendor->id]);

        $this->assertCount(2, $vendor->coupons);
        $this->assertInstanceOf(Collection::class, $vendor->coupons);
    }

    /** @test */
    public function it_has_active_coupons()
    {
        $vendor = factory(Vendor::class)->create();
        $activeCoupon = factory(Coupon::class)->create(['vendor_id' => $vendor->id, 'expires_at' => now()->addDay()]);
        $expiredCoupon = factory(Coupon::class)->create(['vendor_id' => $vendor->id, 'expires_at' => now()->subDay()]);

        $this->assertCount(1, $vendor->activeCoupons);
        $this->assertInstanceOf(Collection::class, $vendor->activeCoupons);
    }
}
