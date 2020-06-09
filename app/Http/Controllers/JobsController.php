<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobCollection;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Resources\Job as JobResource;


class JobsController extends Controller
{
    /**
     * Get the list of jobs
     *
     * @return collection
     */
    public function index()
    {
        $jobs = Job::with('company')
            ->with('location')
            ->with('tags')
            ->paginate();

        return new JobCollection($jobs);
    }

    /**
     * Job details of specific job by slug
     *
     * @param string $slug
     * @return void
     */
    public function details($slug)
    {
        $job = Job::where('slug', $slug)
            ->with('company')
            ->with('location')
            ->with('tags')
            ->first();

        if (!$job) {
            return response([
                'message' => 'Job entry not found'
            ], 404);
        }

        return new JobResource($job);
    }
}
