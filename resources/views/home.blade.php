@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company Statistics') }}</div>

                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-md-8 pb-3">
                            <span>
                                Total Company : {{ $totalCompany }}
                            </span>
                        </div>
                        <div class="col-md-8">
                            <a href="{{ route('companies.index') }}" class="btn btn-primary">
                                Go to this module <i class="bi bi-box-arrow-in-right"></i>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello') }} {{ Auth::user()->name }}.
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
