<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
use Illuminate\Support\Facades\DB;

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

    public function store(companies $company)
    {

        if(request('logo') == null) {

            companies::insert([$this->companyRules()]);

        } else {

            companies::insert([
                array_merge($this->companyRules(), [
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

        return redirect('/companies');
    }

    public function edit()
    {
        return view('editcompany', [
            'company' => companies::find(request('id'))
        ]);
    }

    public function update(companies $company){

        if(request('logo') == null) {

            $attributes = $this->companyRules();

        } else {

            $attributes = array_merge($this->companyRules(), [
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

        return redirect('/companies');

    }

    public function destroy()
    {

        $company = companies::where('id', request('id'))->firstorfail()->delete();

        return redirect('/companies');
    }

    protected function companyRules()
    {
        return request()->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url'
        ]);
    }
}
