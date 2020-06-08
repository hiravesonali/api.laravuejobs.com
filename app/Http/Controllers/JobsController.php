<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobCollection;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')
            ->with('location')
            ->paginate();

        return new JobCollection($jobs);
    }
}
