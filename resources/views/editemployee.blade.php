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

    <h2>Edit Employee</h2>

<form method="POST" action="/updateemployee" class="border p-4">
    <fieldset>

    @csrf

    <input type="hidden" name="id" value="{{$employee->id}}">

    <div class="mb-3">
        <label for="first_name">First name: </label>
        <input type="text" class="form-control" name="first_name" id="first_name" value="{{$employee->first_name}}" required>
    </div>

    <div class="mb-3">
        <label for="last_name">Last name: </label>
        <input type="text" class="form-control" name="last_name" id="last_name" value="{{$employee->last_name}}" required>
    </div>

    <!-- needs to be a dropdown with all the companies in the database -->
    <div class="mb-3">
        <label for="company">Company: </label>
        <select class="form-control" name="company" id="company">
            @foreach ($companies as $company)
                <option value="{{ $company->name }}" 
                @if ($company->name === $employee->company)
                    selected="selected"
                @endif
                >{{ $company->name }}</option>
            @endforeach
        <select>
    </div>

    <div class="mb-3">
        <label for="email">Email address: </label>
        <input type="text" class="form-control" name="email" id="email" value="{{$employee->email}}">
        <p>(eg. email@email.com)</p>
    </div>

    <div class="mb-3">
        <label for="phone_no">Phone number: </label>
        <input type="text" class="form-control" name="phone_no" id="phone_no" value="{{$employee->phone_no}}">
        <p>(No spaces)</p>
    </div>

    <input type="submit" class="btn btn-secondary text-xs text-gray-400" value="Edit employee">
        
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

@endsection