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
    <table class="table table-striped border">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Logo</th>
                <th scope="col">Website</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="companies-table">
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                @if (isset($company->logo)) 
                <td><img src="{{ asset('storage/' .  Illuminate\Support\Str::substr($company->logo, 7)) }}" style="width:100px; height:100px;"></td>
                @else 
                <td> </td>
                @endif 
                <td>{{ $company->website }}</td>
                <!-- delete company where name = company->name? -->
                <td>
                    <form method="POST" action="/editcompany">
                        @csrf

                        <input type="hidden" name="id" value="{{$company->id}}">

                        <button class="btn btn-secondary text-xs text-gray-400">Edit</button>
                    </form>
                </td>

                <td>
                    <form method="POST" action="/companies">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$company->id}}">

                        <button class="btn btn-dark text-xs text-gray-400">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Should probably be on the right, normal paginate made buttons way too large for some reason -->
    <div class="float-end">
        {{ $companies->links() }}
    </div>

</div>

<!-- $companies returns a collection, a 2d array essentially -->
<!-- {{ $companies }} -->
<!-- Illuminate\Support\Str::substr basically just a trim function, returns only the image source, since it's adding public/ to it for some reason which doesn't work-->

@endsection