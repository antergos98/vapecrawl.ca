<?php

namespace Tests\Unit;

use App\Coupon;
use App\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CouponTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_vendor()
    {
        $coupon = factory(Coupon::class)->create();
        $this->assertInstanceOf(Vendor::class, $coupon->vendor);
    }
}
