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

<div class="container">

    <h2>Edit Company</h2>

<form method="POST" action="/updatecompany" enctype="multipart/form-data" class="border p-4">
    <fieldset>

    @csrf

    <input type="hidden" name="id" value="{{$company->id}}">

    <div class="mb-3">
        <label for="name">Company name: </label>
        <input type="text" class="form-control" name="name" id="name" value="{{$company->name}}" required>
    </div>

    <div class="mb-3">
        <label for="email">Email address: </label>
        <input type="text" class="form-control" name="email" id="email" value="{{$company->email}}">
    </div>

    <div class="mb-3">
        <label for="logo">Company logo: </label>
        <input type="file" class="form-control" name="logo" id="logo" value="{{ $company->logo }}" >
    </div>

    <div class="mb-3">
        <label for="website">Website address: </label>
        <input type="text" class="form-control" name="website" id="website" value="{{$company->website}}">
    </div>

    <input type="submit" class="btn btn-secondary text-xs text-gray-400" value="Edit company">
        
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