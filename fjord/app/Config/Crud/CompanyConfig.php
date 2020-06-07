<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Fjord\Crud\Fields\Blocks\Repeatables;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Company;
use FjordApp\Controllers\Crud\CompanyController;

class CompanyConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Company::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CompanyController::class;

    /**
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['name'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'id.desc';

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Company',
            'plural' => 'Companies',
        ];
    }

    /**
     * Sort by keys.
     *
     * @return array
     */
    public function sortBy()
    {
        return [
            'id.desc' => __f('fj.sort_new_to_old'),
            'id.asc' => __f('fj.sort_old_to_new'),
        ];
    }

    /**
     * Initialize index query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function indexQuery(Builder $query)
    {
        // $query->with('relation');

        return $query;
    }

    /**
     * Index table filter groups.
     *
     * @return array
     */
    public function filter()
    {
        return [
            // Filter have to be in groups.
            'Fitler Group Title' => [

                // Use scopes as filter.
                'scopeName' => 'Description',
            ],
        ];
    }

    /**
     * Build index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {
        $table->col('Name')->value('{name}')->sortBy('name');
        $table->col('website')->value('{website}')->sortBy('website');
        $table->col('twitter_handle')->value('{twitter_handle}')->sortBy('twitter_handle');

    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(function($form) {

            $this->mainCard($form);

        })
        ->width(12)
        ->title('Main');
    }

    /**
     * Define form sections in methods to keep the overview.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function mainCard(CrudForm $form)
    {
        $form->input('name')
                ->title('Name')
                ->width(6);

        $form->input('website')
                ->title('Website')
                ->width(6);

        $form->input('twitter_handle')
                ->title('Twitter Handle')
                ->width(6);

        $form->input('email')
                ->title('Email')
                ->width(6);

        $form->input('apply_url')
                ->title('Apply URL');

        $form->wysiwyg('about')
                ->title('About');

    }
}
