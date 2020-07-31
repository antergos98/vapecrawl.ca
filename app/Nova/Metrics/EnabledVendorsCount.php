<?php

namespace App\Nova\Metrics;

use App\Vendor;
use Laravel\Nova\Metrics\Value;

class EnabledVendorsCount extends Value
{
    public $name = "Number of enabled vendors";
    /**
     * Calculate the value of the metric.
     *
     * @return mixed
     */
    public function calculate()
    {
        return $this->result(Vendor::enabled()->count());
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'enabled-vendors-count';
    }
}