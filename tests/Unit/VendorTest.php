<?php

namespace Tests\Unit;


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
}
