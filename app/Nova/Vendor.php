<?php

namespace App\Nova;

use App\Nova\Actions\DeleteProducts;
use App\Nova\Filters\ImporterTypeFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Vendor extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Vendor::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')
                ->rules(['required'])
                ->creationRules('unique:vendors,name')
                ->updateRules('unique:vendors,name,{{resourceId}}'),
            Text::make('URL')
                ->rules(['required', 'url'])
                ->help('Don\'t forget the \'/\' at the end')
                ->creationRules('unique:vendors,url')
                ->updateRules('unique:vendors,url,{{resourceId}}'),
            Text::make('Slug')
                ->rules('required')
                ->creationRules('unique:vendors,slug')
                ->updateRules('unique:vendors,slug,{{resourceId}}')
                ->hideFromIndex(),
            Text::make('Products', fn($vendor) => $vendor->products()->count())
                ->onlyOnIndex(),
            Text::make('Clicks', fn($vendor) => $vendor->clicks()->count())
                ->onlyOnIndex(),
            DateTime::make('Products Refreshed At')
                ->onlyOnIndex(),
            Text::make('Shipping Info')
                ->hideFromIndex(),
            Textarea::make('Notes')
                ->hideFromIndex(),
            HasMany::make('Coupons')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
