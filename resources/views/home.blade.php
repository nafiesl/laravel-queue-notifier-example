@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} auth user: {{ auth()->id() }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <hr>
                    <a href="{{ route('long-run-job') }}" class="btn btn-success">Run a long job</a>
                    <a href="{{ route('private-long-run-job') }}" class="btn btn-success">Run a long private job</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
