@extends('master')

@section('title', isset($user) ? 'Editar Usuário' : 'Gerenciamento de Usuários')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($user) ? __('Editar Usuário') : __('Gerenciamento de Usuários') }}</div>

                <div class="card-body">
                    <!-- Exibir Mensagens de Sucesso -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Formulário de Criação/Edição de Usuário -->
                    <form method="POST" action="{{ isset($user) ? route('admin.update-user', $user) : route('admin.store-user') }}">
                        @csrf
                        @if(isset($user))
                            @method('PATCH')
                        @endif
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nome') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ isset($user) ? __('Nova Senha') : __('Senha') }}</label>
                            <input id="password" type="password" class="form-control" name="password" {{ isset($user) ? '' : 'required' }}>
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ isset($user) ? __('Confirme a Nova Senha') : __('Confirme a Senha') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" {{ isset($user) ? '' : 'required' }}>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">{{ __('Perfil') }}</label>
                            <select id="role" class="form-control" name="role" required>
                                <option value="user" {{ old('role', isset($user) ? $user->role : '') == 'user' ? 'selected' : '' }}>{{ __('User') }}</option>
                                <option value="admin" {{ old('role', isset($user) ? $user->role : '') == 'admin' ? 'selected' : '' }}>{{ __('Admin') }}</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">{{ isset($user) ? __('Atualizar Usuário') : __('Criar Usuário') }}</button>
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
                                        <!-- Botão de Excluir -->
                                        <form action="{{ route('admin.delete-user', $user) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja deletar este usuário?');">{{ __('Excluir') }}</button>
                                        </form>
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
