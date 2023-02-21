<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEmployee;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('employees', [
            'employees' => DB::table('employees')->simplePaginate(10)
        ]);
    }

    public function specificIndex()
    {
        //returns individual info about a company and all employees working there
        return view('details', [
            $companies = DB::table('companies')->where('name', request('name'))->get(),
            $employees = DB::table('employees')->where('company', request('name'))->get(),
            'companies' => $companies,
            'employees' => $employees,
            // ddd(url()->current())
            // ddd(substr(url()->current(), strpos(url()->current(), "y/") + 2))

        ]);
    }

    public function create()
    {
        return view('createemployee', [

            $companies = DB::table('companies')->get(),
            // ddd($companies)
            'companies' => $companies
        ]);
    }

    public function store(employees $employee, StoreEmployee $request)
    {

        $companyId = DB::table('companies')->where('name', request('company'))->get('id');
        // ddd(substr($companyId, strpos($companyId, ":") + 1));
        // ddd(trim($companyId, '{[ "id": ]}'));
        $validated = $request->validated();

        employees::insert([array_merge($validated, [
            'company_id' => trim($companyId, '{[ "id": ]}')
        ])]);

        return redirect()->route('employees');
    }

    public function edit()
    {
        return view('editemployee', [
            'employee' => employees::find(request('id')),

            $companies = DB::table('companies')->get(),
            'companies' => $companies
        ]);
    }

    public function update(employees $employee, StoreEmployee $request){

        $companyId = DB::table('companies')->where('name', request('company'))->get('id');
        $validated = $request->validated();

        try {
            employees::where('id', request('id'))->update(array_merge($validated, [
                'id' => request('id'),
                'company_id' => trim($companyId, '{[ "id": ]}')
            ]));

            return redirect()->route('employees');
        }
        catch (Throwable $e)
        {
            // return redirect()->route('employees')->withErrors($e);
            ddd('hello');
        }
    }

    public function destroy()
    {

        $employee = employees::where('id', request('id'))->firstorfail()->delete();

        return redirect()->route('employees');
    }

    // protected function employeeRules()
    // {
    //     return request()->validate([
    //         'first_name' => 'required|max:255',
    //         'last_name' => 'required|max:255',
    //         'company' => 'nullable|max:255',
    //         'email' => 'nullable|email',
    //         'phone_no' => 'nullable|numeric'
    //     ]);
    // }
}
