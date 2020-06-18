<?php


namespace App\Importer;


use App\Vendor;

interface ImporterInterface
{
    public function import(): void;
}
