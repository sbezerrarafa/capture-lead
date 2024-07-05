@extends('master')

@section('title', 'Search Places')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Resultados da Pesquisa') }}</div>
                <div class="card-body">
                    <form action="{{ route('search.places') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Buscar locais">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                    
                    @if(isset($placesDetails) && count($placesDetails) > 0)
                        <form action="{{ route('leads.store') }}" method="POST" id="create-list-form">
                            @csrf
                            <input type="hidden" name="lista_nome" value="{{ $query }}">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>Endereço</th>
                                            <th>Nota</th>
                                            <th>Website</th>
                                            <th>URL</th>
                                            <th>Coordenadas</th>
                                            <th>Categoria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($placesDetails as $index => $place)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selected_places[]" value="{{ json_encode($place['result']) }}">
                                            </td>
                                            <td>{{ $place['result']['name'] }}</td>
                                            <td>{{ $place['result']['formatted_phone_number'] ?? 'Não Cadastrado' }}</td>
                                            <td>{{ $place['result']['formatted_address'] ?? 'Não Cadastrado' }}</td>
                                            <td>{{ $place['result']['rating'] ?? 'Não Cadastrado' }}</td>
                                            <td>{{ $place['result']['website'] ?? 'Não Cadastrado' }}</td>
                                            <td>{{ $place['result']['url'] ?? 'Não Cadastrado' }}</td>
                                            <td>
                                                @if(isset($place['result']['geometry']['location']))
                                                    Lat: {{ $place['result']['geometry']['location']['lat'] }}, Lon: {{ $place['result']['geometry']['location']['lng'] }}
                                                @else
                                                    Não Cadastrado
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($place['result']['types']))
                                                    {{ implode(', ', $place['result']['types']) }}
                                                @else
                                                    Não Cadastrado
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-success mt-3" id="open-modal-btn">Criar Lista</button>
                        </form>
                        @if(isset($nextPageToken))
                            <form action="{{ route('search.places') }}" method="GET">
                                <input type="hidden" name="query" value="{{ $query }}">
                                <input type="hidden" name="pageToken" value="{{ $nextPageToken }}">
                                <button type="submit" class="btn btn-primary mt-3">Próxima Página</button>
                            </form>
                        @endif
                    @else
                        <p class="text-muted">Nenhum resultado encontrado.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createListModal" tabindex="-1" role="dialog" aria-labelledby="createListModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createListModalLabel">Nova Lista de Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('leads.store') }}" method="POST" id="modal-form">
                    @csrf
                    <input type="hidden" name="lista_nome" value="{{ $query }}">
                    <input type="hidden" name="selected_places">
                    <div class="form-group">
                        <label for="lista_nome">Informe o nome da lista:</label>
                        <input type="text" name="lista_nome" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-success" id="submit-modal-btn">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openModalBtn = document.getElementById('open-modal-btn');
        const submitModalBtn = document.getElementById('submit-modal-btn');
        
        openModalBtn.addEventListener('click', function() {
            $('#createListModal').modal('show');
        });

        submitModalBtn.addEventListener('click', function() {
            const selectedPlaces = $('input[name^="selected_places[]"]:checked').map(function(){
                return JSON.parse($(this).val());
            }).get();
            
            $('input[name="selected_places"]').val(JSON.stringify(selectedPlaces));
            $('#modal-form').submit();
        });
    });
</script>
@endsection
