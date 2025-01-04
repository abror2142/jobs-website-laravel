<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index (Request $request) {
        return view("pages.admin.company.index", ["company" => $request->user()->company]);
    }

    public function edit (Request $request) {
        return view ('pages.admin.company.update', ['company' => $request->user()->company]);
    }

    public function update (Request $request) {
        $company = $request->user()->company;
        $attributes = $request->validate([
            'name' => ['required'],
            'short_description' => ['required'],
            'full_description' => ['required']
        ]);

        if ($request->file('logo') != null) {
            if ($company->logo != null) {
                File::delete(public_path($company->logo));
            }
            $logo = $request->logo;

            $logoNewName = time() . '-' . $attributes['name'] . '.' . $logo->getClientOriginalExtension();
    
            $base_directory = 'images/company/';
    
            if (!file_exists('./' . $base_directory)) {
                mkdir('./' . $base_directory,0777, true);
            }
            
            $logo->move($base_directory, $logoNewName);
            $attributes['logo'] = $base_directory . $logoNewName;
        }
        $attributes['user_id'] = $request->user()->id;
        $company->update($attributes);
        return redirect('/company');
    }

    public function create () {
        return view('pages.admin.company.create');
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

        $base_directory = 'images/company/';

        $attributes['logo'] = $base_directory . $logoNewName;
        $attributes['user_id'] = $request->user()->id;
        
    
        if (!file_exists('./' . $base_directory)) {
            mkdir('./' . $base_directory,0777, true);
        }
        
        $logo->move($base_directory, $logoNewName);

        $company = Company::create($attributes);        

        return redirect('/company');
    }
}
