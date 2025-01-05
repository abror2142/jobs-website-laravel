<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class GuestController extends Controller
{
    public function index(Request $request) {
        $jobs = Job::where('active', true)->latest()->simplePaginate(10);
        return view('pages.guest.index', ['jobs'=>$jobs]);
    }
}
