<?php

use App\Http\Resources\JobCollection;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('jobs', 'JobsController@index');


Route::get('jobs/{slug}', 'JobsController@details');
