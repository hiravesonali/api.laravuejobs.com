<?php

namespace FjordApp\Config\Form\Pages;

use App\Models\Company;
use Fjord\Crud\CrudForm;
use App\Models\Department;
use App\Models\Job;
use App\Models\Location;
use Fjord\Crud\Config\FormConfig;
use Fjord\Vue\Crud\RelationTable;
use Fjord\Crud\Config\Traits\HasCrudForm;
use Fjord\Crud\Fields\Blocks\Repeatables;
use FjordApp\Controllers\Form\Pages\HomeController;

class HomeConfig extends FormConfig
{
    use HasCrudForm;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = HomeController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'home';

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Dashboard'
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(function ($form) {
            $form->input('length')
            ->title('Numbers')
            ->placeholder(Job::count());
        })
        ->width(6)
        ->title('Jobs');

        $form->card(function ($form) {
            $form->input('length')
            ->title('Numbers')
            ->placeholder(Company::count());
        })
        ->width(6)
        ->title('Companies');

        $form->card(function ($form) {
            $form->input('length')
            ->title('Numbers')
            ->placeholder(Location::count());
        })
        ->width(6)
        ->title('Locations');
    }
}
