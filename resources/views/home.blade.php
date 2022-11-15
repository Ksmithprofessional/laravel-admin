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

                        {{ 'Hello!' }}
                        <div>
                            <a href="/companies">Companies</a>
                            <a href="/employees">Employees</a>
                            <a href="/createcompany">Add a company</a>
                            <a href="/createemployee">Add an employee</a>
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
