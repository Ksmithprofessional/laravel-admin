@extends('layouts.app')
<?php 
use App\Http\Controllers\EmployeesController;
use App\Models\employees;
?>

@guest

redirect();
@endguest
@section('content')

<div class="container">

<h2>Add Employee</h2>

    <form method="POST" action="/createemployee" class="border p-4">
        <fieldset>

            @csrf

            <div class="mb-3">
                <label for="first_name">First name: </label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name">Last name: </label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="company">Company: </label>
                <select class="form-control" name="company" id="company">
                    @foreach ($companies as $company)
                    <option value="{{ $company->name }}"
                    @if($company->name === substr(url()->previous(), strpos(url()->previous(), "y/") + 2))
                        selected="selected"
                    @endif>{{ $company->name }}</option>
                    @endforeach
                <select>
            </div>

            <div class="mb-3">
                <label for="email">Email address: </label>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                <p>(eg. email@email.com)</p>
            </div>

            <div class="mb-3">
                <label for="phone_no">Phone number: </label>
                <input type="text" class="form-control" name="phone_no" id="phone_no" value="{{ old('phone_no') }}">
                <p>(No spaces)</p>
            </div>

            <input type="submit" class="btn btn-secondary" value="Add employee">
            
        </fieldset>

    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
@endsection