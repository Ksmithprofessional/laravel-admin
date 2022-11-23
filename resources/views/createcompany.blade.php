@extends('layouts.app')
<?php 
use App\Http\Controllers\CompaniesController;
use App\Models\companies;
?>

@guest

redirect();
@endguest
@section('content')


<div class="container">

    <h2>Add Company</h2>

    <form method="POST" action="/createcompany" enctype="multipart/form-data" class="border p-4">
        <fieldset>

            @csrf

            <div class="mb-3">
                <label for="name">Company name: </label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email">Email address: </label>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" >
            </div>

            <div class="mb-3">
                <label for="logo">Company logo: </label>
                <input type="file" class="form-control" name="logo" id="logo" value="{{ old('logo') }}" >
            </div>

            <div class="mb-3">
                <label for="website">Website address: </label>
                <input type="text" class="form-control" name="website" id="website" value="{{ old('website') }}" >
            </div>

            <input type="submit" class="btn btn-secondary" value="Add company">
            
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