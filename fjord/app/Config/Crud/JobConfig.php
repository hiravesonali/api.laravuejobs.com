<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Fjord\Crud\Fields\Blocks\Repeatables;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Job;
use FjordApp\Controllers\Crud\JobController;

class JobConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Job::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = JobController::class;

    /**
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['title'];

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
            'singular' => 'Job',
            'plural' => 'Jobs',
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
        $table->col('Title')->value('{title}')->sortBy('title');
        $table->col('position_type')->value('{position_type}')->sortBy('position_type');
        $table->col('salary')->value('{salary}')->sortBy('salary');
        $table->col('description')->value('{description}')->sortBy('description');
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
        $form->input('title')
                ->title('Title')
                ->width(6);

        $form->checkboxes('position_type')
                ->title('Position type')
                ->options([
                    'full time' => 'Full time',
                    'part time' => 'Part time',
                    'both' => 'Both',
                ])
                ->width(6);

        $form->boolean('active')
                ->title('Is Remote')
                ->width(6);

        $form->input('contact_person')
                ->title('Contact person')
                ->width(6);

        $form->input('contact_person_email')
                ->title('Contact person email')
                ->width(6);

        $form->input('apply_url')
                ->title('Apply URL')
                ->width(6);

        $form->input('salary')
                ->title('Salary')
                ->width(6);

        $form->input('published_at')
                ->title('Published at')
                ->width(6);

        $form->wysiwyg('description')
                ->title('Description');
    }
}
