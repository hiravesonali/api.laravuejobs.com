<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobCollection;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Resources\Job as JobResource;


class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')
            ->with('location')
            ->paginate();

        return new JobCollection($jobs);
    }

    public function details($slug)
    {
        $job = Job::where('slug', $slug)
            ->with('company')
            ->with('location')
            ->first();

        if (!$job) {
            return response([
                'message' => 'Job entry not found'
            ], 404);
        }

        return new JobResource($job);
    }
}
