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
    <table class="table table-striped border">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Company</th>
                <th scope="col">Email Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col"></th>
                <th scope="col"></th>
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

                        <button class="btn btn-secondary text-xs text-gray-400">Edit</button>
                    </form>
                </td>

                <td>
                    <form method="POST" action="/employees">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$employee->id}}">

                        <button class="btn btn-dark text-xs text-gray-400">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Should probably be on the right, normal paginate made buttons way too large for some reason -->
    <div class="float-end">
        {{ $employees->links() }}
    </div>

</div>

@endsection