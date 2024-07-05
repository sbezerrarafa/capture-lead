@extends('master')

@section('title', 'Editar Lista de Leads')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Editar Lista de Leads') }}</div>
                <div class="card-body">
                    @if($leads->isNotEmpty())
                        <form method="POST" action="{{ route('leads.update', $leads->first()->hash_lista) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="lista_nome">Nome da Lista</label>
                                <input type="text" class="form-control" id="lista_nome" name="lista_nome" value="{{ $leads->first()->lista_nome }}" required>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label>Leads na Lista</label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Selecione para remover</th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>Endereço</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($leads as $leadItem)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="leads[]" value="{{ $leadItem->id }}">
                                                </td>
                                                <td>{{ $leadItem->nome }}</td>
                                                <td>{{ $leadItem->telefone }}</td>
                                                <td>{{ $leadItem->endereco }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-primary">Remover da Lista</button>
                        </form>
                    @else
                        <p class="text-muted">Nenhum lead encontrado nesta lista.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
