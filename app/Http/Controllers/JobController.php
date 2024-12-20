<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    // protected $table = "job_openings";

    public function create (Request $request) {
        return view('job.create');
    }

    public function store (Request $request) {

        $attributes = $request->validate([
            'title' => ['required'],
            'short_description' => ['required'],
            'full_description' => ['required'],
        ]);

        $attributes['company_id'] = $request->user()->company->id;

        $job = Job::create($attributes);
        dd($job);

        return redirect('/');
    }
}