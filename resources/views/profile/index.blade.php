@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Manage users') }}</div>

                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('user.create') }}">Create user</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped mt-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @foreach ($users as $user)
                                <!--condicio per a que els administradors no es puguin editar entre si-->
                                @if ($user->role_id != 1)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('user.destroy', $user->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
