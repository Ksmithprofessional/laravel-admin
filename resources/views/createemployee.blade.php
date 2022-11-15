@extends('layouts.app')
<?php 
use App\Http\Controllers\EmployeesController;
use App\Models\employees;
?>

@guest

redirect();
@endguest
@section('content')

<form method="POST" action="/createemployee">
    <fieldset>

    @csrf

    <label for="firstname">First name: </label>
    <input type="text" name="firstname" id="firstname" required>

    <label for="lastname">Last name: </label>
    <input type="text" name="lastname" id="lastname" required>

    <label for="company">Company: </label>
    <input type="text" name="company" id="company">

    <label for="email">Email address: </label>
    <input type="text" name="email" id="email">

    <label for="phoneno">Phone number: </label>
    <input type="text" name="phoneno" id="phoneno">

    <input type="submit" value="Add employee">
        
    </fieldset>

</form>
@endsection