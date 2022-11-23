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

                        {{ 'Welcome!' }}
                        <div class="text-center">
                            <div class="row">

                                <div class="col">
                                    <a href="/companies">Companies</a>
                                </div>

                                <div class="col">
                                    <a href="/employees">Employees</a>
                                </div>

                                <div class="col">
                                    <a href="/createcompany">Add a company</a>
                                </div>

                                <div class="col">
                                    <a href="/createemployee">Add an employee</a>
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
