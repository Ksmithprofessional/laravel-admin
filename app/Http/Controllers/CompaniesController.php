<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;

class CompaniesController extends Controller
{

    public function index()
    {
        return view('companies', [
            // seems to return a collection
            'companies' => companies::all()
        ]);
    }

    public function create()
    {
        return view('createcompany');
    }

    public function store(companies $company)
    {
        companies::insert([
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'logo' => request()->file('logo')->store('public'),
            'website' => request()->input('website')
        ]);

        return redirect('/companies');
    }

    public function edit()
    {
        return view('editcompany', [
            'company' => companies::find(request('id'))
        ]);
    }

    public function update(companies $company){

        $company = companies::where('id', request('id'))->update([

            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'logo' => request()->file('logo')->store('public'),
            'website' => request()->input('website')
        ]);

        return redirect('/companies');

    }

    public function destroy()
    {

        $company = companies::where('id', request('id'))->firstorfail()->delete();

        return redirect('/companies');
    }
}
