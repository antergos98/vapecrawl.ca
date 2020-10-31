<?php

namespace Tests\Feature\Commands;

use App\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyExpiredCouponsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_removes_expired_coupons_from_database()
    {
        factory(Coupon::class, 2)->create(['expires_at' => now()->subDay()]);

        $this->artisan('destroy:expired:coupons');

        $this->assertDatabaseCount('coupons', 0);
    }

    /** @test */
    public function it_does_not_remove_active_coupons()
    {
        factory(Coupon::class, 2)->create(['expires_at' => now()->addDay()]);

        $this->artisan('destroy:expired:coupons');

        $this->assertDatabaseCount('coupons', 2);
    }
}
