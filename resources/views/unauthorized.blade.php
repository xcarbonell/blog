@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Unauthorized access') }}</div>
                    @csrf
                    <div class="card-body">
                        <p>You don't have access to this resource.</p>
                        <a class="btn btn-primary" href="{{ route('home') }}">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
