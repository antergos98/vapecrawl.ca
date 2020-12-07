<?php

namespace Tests\Unit\Helpers;

use App\Helpers\PriceFormatter;
use PHPUnit\Framework\TestCase;

class PriceFormatterTest extends TestCase
{
    /** @test */
    public function it_can_format_prices()
    {
        $instance = new PriceFormatter;

        // Strings
        $this->assertSame(0, $instance->format('Random string'));
        $this->assertSame(1999, $instance->format('CAD$19.99'));
        $this->assertSame(1000, $instance->format('10$'));
        $this->assertSame(1000, $instance->format('CAD 10$'));
        $this->assertSame(0, $instance->format('0'));
        $this->assertSame(1099, $instance->format('10,99'));
        $this->assertSame(1099, $instance->format('10.99'));
        $this->assertSame(1099, $instance->format('10.99 CAD'));
        $this->assertSame(1099, $instance->format('$10.99'));
        $this->assertSame(1099, $instance->format('10.99$'));
        $this->assertSame(1099, $instance->format('10,99'));
        $this->assertSame(599, $instance->format('5.99'));
        $this->assertSame(99, $instance->format('0.99'));
        $this->assertSame(99, $instance->format('0.99'));
        $this->assertSame(99, $instance->format('0000.9900000'));

        // Floats
        $this->assertSame(1050, $instance->format(10.50));
        $this->assertSame(599, $instance->format(5.99));

        // Integers
        $this->assertSame(10, $instance->format(10));

        // Null
        $this->assertSame(0, $instance->format(null));
    }
}
