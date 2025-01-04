<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;

class JobController extends Controller
{
    // protected $table = "job_openings";

    public function index (Request $request) {
        $jobs = $request->user()->jobs()->latest()->simplePaginate(2);
        return view("pages.admin.job.index", ["jobs" => $jobs]);
    }

    public function all() {
        $jobs = Job::all();
        return $jobs;
    }

    public function show (Job $job) {
        return view("job.show", ["job" => $job]);
    }

    public function create (Request $request) {
        $categories = Category::whereNull('parent_id')->get();
        return view('pages.admin.job.create', ['categories' => $categories]);
    }

    public function store (Request $request) {
        $attributes = $request->validate([
            'title' => ['required'],
            'short_description' => ['required'],
            'full_description' => ['required'],
            'category_id' => ['required'],
        ]);
        $attributes['company_id'] = $request->user()->company->id;
        $job = Job::create($attributes);
        return redirect('/admin/jobs');
    }
    public function edit (Job $job) {
        return view('pages.admin.job.update', ["job" => $job]);
    }

    public function update (Request $request, Job $job) {
        $attributes = $request->validate([
            "title" => ['required'],
            "short_description" => ['required'],
            "full_description" => ['required'],
        ]);

        $job->update($attributes);

        return redirect('/jobs');
    }

    public function destroy (Job $job) {
        $job->delete();
        return redirect('/jobs');
    }
}


