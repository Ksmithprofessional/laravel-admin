<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCompany;

class CompaniesController extends Controller
{

    public function index()
    {
        return view('companies', [
            'companies' => DB::table('companies')->simplePaginate(10)
        ]);
    }

    public function create()
    {
        return view('createcompany');
    }

    public function store(companies $company, StoreCompany $request)
    {

        $validated = $request->validated();

        // ddd($validated);

        if(request('logo') == null) {

            companies::insert([$validated]);

        } else {

            companies::insert([
                array_merge($validated, [
                    'logo' => request()->file('logo')->store('public')
                ]
            )]);
        }
        // companies::insert([
        //     'name' => request()->input('name'),
        //     'email' => request()->input('email'),
        //     'logo' => request()->file('logo')->store('public'),
        //     'website' => request()->input('website')
        // ]);

        return redirect()->route('companies');
    }

    public function edit()
    {
        return view('editcompany', [
            'company' => companies::find(request('id'))
        ]);
    }

    public function update(companies $company, StoreCompany $request){


        $validated = $request->validated();
        if(request('logo') == null) {

            $attributes = $validated;

        } else {
            // ddd($validated);
            $attributes = array_merge($validated, [
                    'logo' => request()->file('logo')->store('public')
                ]
            );
        }

        companies::where('id', request('id'))->update($attributes);

        // $company = companies::where('id', request('id'))->update([

        //     'name' => request()->input('name'),
        //     'email' => request()->input('email'),
        //     'logo' => request()->file('logo')->store('public'),
        //     'website' => request()->input('website')
        // ]);

        return redirect()->route('companies');

    }

    public function destroy()
    {

        // $companyName = DB::table('companies')->select('name')->where('id', request('id'));
        // ddd($companyName);
        $company = companies::where('id', request('id'))->firstorfail()->delete();
        // DB::table('employees')->where('company', request('name'))->delete();

        return redirect()->route('companies');
    }

    // protected function companyRules()
    // {
    //     return request()->validate([
    //         'name' => 'required|max:255',
    //         'email' => 'nullable|email',
    //         'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
    //         'website' => 'nullable|url'
    //     ]);
    // }
}
