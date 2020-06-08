<?php

namespace FjordApp\Controllers\Crud;

use Illuminate\Database\Eloquent\Builder;

use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\CrudController;

class LocationController extends CrudController
{
    /**
     * Crud model class name.
     *
     * @var string
     */
    protected $model = \App\Models\Location::class;

    /**
     * Authorize request for permission operation and authenticated fjord-user.
     * Operations: create, read, update, delete
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return true; //$user->can("{$operation} locations");
    }

    /**
     * Initial query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): Builder
    {
        return $this->model::query();
    }
}
