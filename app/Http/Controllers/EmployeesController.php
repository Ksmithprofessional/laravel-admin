<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('employees', [
            // seems to return a collection
            'employees' => DB::table('employees')->simplePaginate(10)
        ]);
    }

    public function create()
    {
        return view('createemployee');
    }

    public function store(employees $employee)
    {

        employees::insert([$this->employeeRules()]);

        //insert works not create, no idea why laracasts used create
        // employees::insert([
        //     'first_name' => request()->input('firstname'),
        //     'last_name' => request()->input('lastname'),
        //     'company' => request()->input('company'),
        //     'email' => request()->input('email'),
        //     'phone_no' => request()->input('phoneno'),
            
        // ]);

        return redirect('/employees');
    }

    public function edit()
    {
        return view('editemployee', [
            'employee' => employees::find(request('id'))
        ]);
    }

    public function update(employees $employee){

        employees::where('id', request('id'))->update(array_merge($this->employeeRules(), [
            'id' => request('id')
        ]));

        return redirect('/employees');

    }

    public function destroy()
    {

        $employee = employees::where('id', request('id'))->firstorfail()->delete();

        return redirect('/employees');
    }

    protected function employeeRules()
    {
        return request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company' => 'nullable|max:255',
            'email' => 'nullable|email',
            'phone_no' => 'nullable|numeric'
        ]);
    }
}
