@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        
                    @if (auth::user()->name)

                        <h2>
                            Welcome!
                        </h2>
                        <p>
                            Feel free to look through our list of companies, their employees, edit them, or add your own!
                        </p>
                        <div class="text-center">
                            <div class="row">

                                <div class="col">
                                    <a href="/companies">
                                        <div class="home-link companies">
                                            <p>Companies</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col">
                                    <a href="/employees">
                                    <div class="home-link employees">
                                        <p>Employees</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <a href="/createcompany">   
                                        <div class="home-link add-company">
                                            <p>Add a Company</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col">
                                    <a href="/createemployee">
                                    <div class="home-link add-employee">
                                            <p>Add an employee</p>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    @endif
                    @guest

                        {{ 'sign in!' }}
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .home-link
    {
        position: relative;
        height: 200px;
        border: 2px solid black;
        border-radius: 5%;
        background-color: rgb(120 113 108);
        margin-top: 10px;
        transition: all 0.5s ease;
    }

    .home-link p 
    {
        position: absolute;
        bottom: 0px;
        width: 100%;
        background-color: black;
        color: white;

    }

    .home-link:hover
    {
        background-color: rgb(168 162 158);
        transform: scale(1.1);
    }

    .col a {
        max-width: 300px;
        margin: 15px auto;
        display: block;
    }

    .companies {
        background: url('storage/companies.jpg');
    }

    .employees {
        background: url('storage/employees.jpg');
    }

    .add-company {
        background: url('storage/addCompany.png');
    }

    .add-employee {
        background: url('storage/addEmployee.jpg');
    }

    .companies,
    .employees,
    .add-company,
    .add-employee {

        background-size: cover;
        background-position: center;
    }
</style>
