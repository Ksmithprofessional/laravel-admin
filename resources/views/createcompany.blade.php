@extends('layouts.app')
<?php 
use App\Http\Controllers\CompaniesController;
use App\Models\companies;
?>

@guest

redirect();
@endguest
@section('content')

<form method="POST" action="/createcompany" enctype="multipart/form-data">
    <fieldset>

    @csrf

    <label for="name">Company name: </label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email address: </label>
    <input type="text" name="email" id="email">

    <label for="logo">Company logo: </label>
    <input type="file" name="logo" id="logo">

    <label for="website">Website address: </label>
    <input type="text" name="website" id="website">

    <input type="submit" value="Add company">
        
    </fieldset>

</form>
@endsection