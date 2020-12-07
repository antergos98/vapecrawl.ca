<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class PriceFormatter
{
    public function format($input): int
    {
        if (is_integer($input)) {
            return $input;
        }

        $input = (string)Str::of($input)->match('([0-9.\,]+)')->replace(',', '.');

        if ($input === "") {
            return 0;
        }

        return intval(strval($input * 100));
    }
}
