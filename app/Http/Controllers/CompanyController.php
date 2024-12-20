<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index () {
        return "Index";
    }

    public function create () {
        return view('company.create');
    }

    public function store (Request $request) {
        // Validate Input
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:4'],
            'short_description' => ['required', 'string', 'max:255'],
            'full_description' => ['required'],
            'logo' => ['required', 'mimes:jpeg,jpg,png', 'max:10240']
        ]);
        
        $logo = $request->logo;

        $logoNewName = time() . '-' . $attributes['name'] . '.' . $logo->getClientOriginalExtension();

        $attributes['logo'] = $logoNewName;
        $attributes['user_id'] = $request->user()->id;
        
        $directory = './images/company/';
    
        if (!file_exists($directory)) {
            mkdir($directory,0777, true);
        }
        
        $logo->move($directory, $logoNewName);

        $company = Company::create($attributes);        

        return redirect('/');
    }
}
