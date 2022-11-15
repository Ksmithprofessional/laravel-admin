@extends('layouts.app')
<?php 
use App\Http\Controllers\EmployeesController;
use App\Models\employees;
?>

@guest

redirect();
@endguest
@section('content')


<form method="POST" action="/updateemployee">
    <fieldset>

    @csrf

    <input type="hidden" name="id" value="{{$employee->id}}">

    <label for="firstname">First name: </label>
    <input type="text" name="firstname" id="firstname" value="{{$employee->first_name}}" required>

    <label for="lastname">Last name: </label>
    <input type="text" name="lastname" id="lastname" value="{{$employee->last_name}}" required>

    <label for="company">Company: </label>
    <input type="text" name="company" id="company" value="{{$employee->company}}">

    <label for="email">Email address: </label>
    <input type="text" name="email" id="email" value="{{$employee->email}}">

    <label for="phoneno">Phone number: </label>
    <input type="text" name="phoneno" id="phoneno" value="{{$employee->phone_no}}">

    <input type="submit" value="Edit employee">
        
    </fieldset>

</form>

@endsection