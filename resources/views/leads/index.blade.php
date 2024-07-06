@extends('master')

@section('title', 'Lista de Leads')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container-content container-tabelas">
    <h3>{{ __('Listas de Leads') }}</h3>
    <div class="card content-tabelas">
        @if($leads->count())
            <table class="table table-hover" id="tableLeaders">
                <thead>
                    <tr>
                        <th>Nome da Lista</th>
                        <th>ID da Lista</th>
                        <th>Total de Leads</th>
                        <th>Criado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leads as $lead)
                        <tr>
                            <td>{{ $lead->lista_nome }}</td>
                            <td>{{ $lead->hash_lista }}</td>
                            <td>{{ $lead->total }}</td>
                            <td>{{ $lead->created_at }}</td>
                            <td>
                                <a href="{{ route('leads.edit', $lead->hash_lista) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('leads.destroy', $lead->hash_lista) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar esta lista?')">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">Nenhuma lista de leads encontrada.</p>
        @endif
    </div>
</div>    
@endsection
