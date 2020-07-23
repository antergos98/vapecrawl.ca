<?php

namespace Tests\Feature;

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
}
