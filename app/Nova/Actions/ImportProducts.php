<?php

namespace App\Nova\Actions;

use App\Vendor;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class ImportProducts extends Action
{
    /**
     * Perform the action on the given models.
     *
     * @param \Laravel\Nova\Fields\ActionFields $fields
     * @param \Illuminate\Support\Collection $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $models->each(function (Vendor $vendor) {
            $vendor->products()->delete();
            $class = "App\\Importer\\" . $vendor->class_name;
            $importer = new $class($vendor);
            $importer->import();
            $vendor->products()->searchable();
        });
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
