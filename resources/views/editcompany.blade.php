@extends('layouts.app')
<?php 
use App\Http\Controllers\CompaniesController;
use App\Models\companies;
use  Illuminate\Support\Str;
?>

@guest

redirect();
@endguest
@section('content')


<form method="POST" action="/updatecompany" enctype="multipart/form-data">
    <fieldset>

    @csrf

    <input type="hidden" name="id" value="{{$company->id}}">

    <label for="name">Company name: </label>
    <input type="text" name="name" id="name" value="{{$company->name}}" required>

    <label for="email">Email address: </label>
    <input type="text" name="email" id="email" value="{{$company->email}}">

    <label for="logo">Company logo: </label>
    <input type="file" name="logo" id="logo">

    <label for="website">Website address: </label>
    <input type="text" name="website" id="website" value="{{$company->website}}">

    <input type="submit" value="Edit company">
        
    </fieldset>

</form>

@endsection