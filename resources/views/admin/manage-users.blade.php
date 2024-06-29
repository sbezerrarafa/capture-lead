<!-- resources/views/admin/manage-users.blade.php -->
@extends('master')

@section('title', 'User Management')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Gerenciamento de Usuários') }}</div>

                <div class="card-body">
                    <!-- Formulário de Criação de Usuário -->
                    <form method="POST" action="{{ route('admin.store-user') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nome') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Senha') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirme a Senha') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">{{ __('Perfil') }}</label>
                            <select id="role" class="form-control" name="role" required>
                                <option value="user">{{ __('User') }}</option>
                                <option value="admin">{{ __('Admin') }}</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">{{ __('Criar Usuário') }}</button>
                        </div>
                    </form>

                    <!-- Tabela de Usuários -->
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>{{ __('Nome') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Perfil') }}</th>
                                <th>{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit-user', $user) }}" class="btn btn-sm btn-primary">{{ __('Editar') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
