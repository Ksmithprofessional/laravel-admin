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

    <a href="/" class="no-underline">&#8592; Home</a>
    <h2 class="mb-4">Employees</h2>
    <div class="mb-4">
        <button class="btn btn-secondary text-xs text-gray-400"><a href="/createemployee" class="text-white no-underline">Add an employee</a></button>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
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
                <td>
                    <form method="POST" action="/company/{{$employee->company}}">
                        @csrf    
                        <input type="hidden" name="name" value="{{$employee->company}}">
                        <button class="button-link">{{ $employee->company }}</button>
                    </form>
                </td>
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

<style>

.no-underline {
    text-decoration: none;
}

.button-link {
  background: none!important;
  border: none;
  padding: 0!important;
  /*optional*/
  font-family: arial, sans-serif;
  /*input has OS specific font-family*/
  color: #069;
  cursor: pointer;
}
</style>