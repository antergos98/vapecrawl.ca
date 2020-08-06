<?php

namespace Tests\Unit;

use App\Product;
use App\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_belongs_to_a_vendor()
    {
        $product = factory(Product::class)->create();
        $this->assertInstanceOf(Vendor::class, $product->vendor);
    }
}
