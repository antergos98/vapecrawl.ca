<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /** @test */
    public function home_works()
    {
        $this->get('/')->assertSuccessful()->assertSeeText('Welcome on Vapecrawl');
    }
}
