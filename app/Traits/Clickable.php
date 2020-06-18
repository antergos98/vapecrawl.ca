<?php

namespace App\Traits;

use App\Models\Click;

trait Clickable
{
    public function clicks()
    {
        return $this->morphMany(Click::class, 'clickable');
    }

    public function incrementClickCount(): void
    {
        $this->clicks()->save(new Click);
    }
}
