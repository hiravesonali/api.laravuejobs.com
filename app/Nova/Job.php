<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;

class Job extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Job::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'slug',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Slug')
                ->hideFromIndex()
                ->rules('required', 'max:254')
                ->creationRules('unique:jobs,slug')
                ->updateRules('unique:jobs,slug,{{resourceId}}'),

            BelongsTo::make('Company')
                ->sortable(),

            BelongsTo::make('Location')
                ->sortable(),

            Select::make('Type')
                ->options([
                    'full time' => 'Full Time',
                    'part time' => 'Part Time',
                    'full time/part time' => 'Both',
                ]),

            Boolean::make('Is Remote')
                ->sortable(),

            Text::make('Contact Person')
                ->hideFromIndex(),

            Text::make('Contact Person Email')
                ->hideFromIndex(),

            Text::make('Apply url')
                ->hideFromIndex(),

            Text::make('Salary')
                ->hideFromIndex(),

            Textarea::make('Description')
                ->hideFromIndex(),

            DateTime::make('Published at'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
