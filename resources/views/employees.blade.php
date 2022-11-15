@extends('layouts.app')
<?php 
use App\Http\Controllers\EmployeesController;
use App\Models\employees;
?>

@guest

redirect();
@endguest
@section('content')

<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Email Address</th>
            <th>Phone Number</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->company }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone_no }}</td>
            <td>
                <form method="POST" action="/editemployee">
                    @csrf

                    <input type="hidden" name="id" value="{{$employee->id}}">

                    <button class="text-xs text-gray-400">Edit</button>
                </form>
            </td>

            <td>
                <form method="POST" action="/employees">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$employee->id}}">

                    <button class="text-xs text-gray-400">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection