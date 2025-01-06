<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;
use App\Models\Category;

class JobController extends Controller
{
    // protected $table = "job_openings";

    public function index (Request $request) {
        $jobs = $request->user()->jobs()->latest()->simplePaginate(10);
        return view("pages.admin.job.index", ["jobs" => $jobs]);
    }

    public function active (Request $request) {
        $jobs = $request->user()->jobs()->where('active', true)->latest()->simplePaginate(10);
        return view("pages.admin.job.active", ["jobs" => $jobs]);
    }

    public function inactive (Request $request) {
        $jobs = $request->user()->jobs()->where('active', false)->latest()->simplePaginate(10);
        return view("pages.admin.job.inactive", ["jobs" => $jobs]);
    }

    public function activate_job(Request $request, Job $job) {
        $status = $request->get("activation-checkbox");
        if($status && $status == 'on') {
            $job->active = true;
        }else {
            $job->active = false;
        }
        $job->save();
        return redirect()->back()->with("success","Activated!");
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
        $tags = Tag::all();
        $data = [
            'categories' => $categories,
            'tags' => $tags,
        ]; 
        return view('pages.admin.job.create', $data);
    }

    public function store (Request $request) {
        $validatedData = $request->validate([
            'title' => ['required'],
            'short_description' => ['required'],
            'full_description' => ['required'],
            'category_id' => ['required'],
            'tags' => 'array', // Ensure 'tags' is an array
            'tags.*' => 'integer|exists:tags,id', // Validate each tag ID
        ]);

        $attributes = [
            'title' => $validatedData['title'],
            'short_description' => $validatedData['short_description'],
            'full_description' => $validatedData['full_description'],
            'category_id' => $validatedData['category_id']
        ];

        $attributes['company_id'] = $request->user()->company->id;

        $attributes['active'] = $request->get('active') === 'on' ?  true : false;

        $job = Job::create($attributes);
        if (!empty($validatedData['tags'])) {
            $job->tags()->attach($validatedData['tags']);
        }
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


