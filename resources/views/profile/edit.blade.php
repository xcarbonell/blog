@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}">
                            @method('PUT')
                            @csrf

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input id="username" name="username" type="text" class="form-control"
                                    value="{{ $user->username }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="text" class="form-control"
                                    value="{{ $user->email }}">
                            </div>

                            <!--condicio per a que nomes el propi usuari es pugui editar la contrasenya-->
                            @if ($user->id == Auth::user()->id)
                                <div class="mb-3">
                                    <label for="newPass" class="form-label">New password</label>
                                    <input id="newPass" name="newPass" type="password" class="form-control" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="confNewPass" class="form-label">Confirm new password</label>
                                    <input id="confNewPass" name="confNewPass" type="password" class="form-control"
                                        value="">
                                </div>
                            @endif

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('user') }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
