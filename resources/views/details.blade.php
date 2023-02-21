@extends('layouts.app')
<?php 
use App\Http\Controllers\EmployeesController;
use App\Models\Employees;
?>

@guest

redirect();
@endguest
@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Company details') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{ url()->previous() }}" class="no-underline">&#8592; Back</a>

            <div class="text-center">
                <div>
                    @foreach ($companies as $company)
                        <img src="{{ asset('storage/' .  Illuminate\Support\Str::substr($company->logo, 7)) }}" style="width:100px; height:100px;">
                        <p>{{ $company->name }}</p>
                        <p>Email address: {{ $company->email }}</p>
                        <p>Company Website: {{ $company->website }}</p>
                    @endforeach
                </div>
                <div>
                    <table class="table table-striped border">
                        <legend>
                            Employees
                        </legend>
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email address</th>
                                <th scope="col">Phone number</th>
                            </tr>
                        </thead>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone_no }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="mb-4">
                        <button class="btn btn-secondary text-xs text-gray-400"><a href="/createemployee" class="text-white no-underline">Add an employee</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>

.no-underline {
    text-decoration: none;
}

</style>