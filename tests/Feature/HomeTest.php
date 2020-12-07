<?php

namespace Tests\Feature;

use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function home_works()
    {
        // Because we display vendor's count on the homepage (:
        factory(Vendor::class)->create();
        $this->get('/')->assertSuccessful()->assertSeeText('Welcome on Vapecrawl');
    }
}
