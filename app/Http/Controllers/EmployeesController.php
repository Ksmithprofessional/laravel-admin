<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('employees', [
            // seems to return a collection
            'employees' => employees::all()
        ]);
    }

    public function create()
    {
        return view('createemployee');
    }

    public function store(employees $employee)
    {

        //insert works not create, no idea why laracasts used create
        employees::insert([
            'first_name' => request()->input('firstname'),
            'last_name' => request()->input('lastname'),
            'company' => request()->input('company'),
            'email' => request()->input('email'),
            'phone_no' => request()->input('phoneno'),
            
        ]);

        return redirect('/employees');
    }

    public function edit()
    {
        return view('editemployee', [
            'employee' => employees::find(request('id'))
        ]);
    }

    public function update(employees $employee){

        $employee = employees::where('id', request('id'))->update([

            'first_name' => request()->input('firstname'),
            'last_name' => request()->input('lastname'),
            'company' => request()->input('company'),
            'email' => request()->input('email'),
            'phone_no' => request()->input('phoneno'),
        ]);

        return redirect('/employees');

    }

    public function destroy()
    {

        $employee = employees::where('id', request('id'))->firstorfail()->delete();

        return redirect('/employees');
    }
}
