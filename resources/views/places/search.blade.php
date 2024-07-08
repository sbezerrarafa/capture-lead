@extends('master')

@section('title', 'Search Places')

@section('content')

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
    <div class="container-content container-tabelas">
        <h3>{{ __('Buscar Clientes') }}</h3>
            <div class="card content-tabelas">
                <form action="{{ route('search.places') }}" method="GET" class="mb-3">
                    <div class="input-group" style="gap:20px">
                        <input type="text" name="query" class="form-control" placeholder="Buscar locais">
                        <button type="submit" class="btn btn-padrao">Buscar</button>
                    </div>
                </form>

                @if(isset($placesDetails) && count($placesDetails) > 0)
                    <div class="card card-map">
                        <div id="map"></div>
                    </div>

                    <form action="{{ route('leads.store') }}" method="POST" id="create-list-form">
                        @csrf
                        <input type="hidden" name="lista_nome" value="{{ $query }}">
                        <div class="table-responsive custom-table-responsive">
                            <table class="table custom-table" id="tableCreateLeads">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Endereço</th>
                                        <th scope="col">Nota</th>
                                        <th scope="col">URL</th>
                                        <th scope="col">Coordenadas</th>
                                        <th scope="col">Categoria</th>
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
    
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: { lat: -7.988, lng: -34.839 }
        });

        var places = @json($placesDetails);
        var markers = [];

        places.forEach(function(place) {
            if (place.result.geometry && place.result.geometry.location) {
                var marker = new google.maps.Marker({
                    position: {
                        lat: place.result.geometry.location.lat,
                        lng: place.result.geometry.location.lng
                    },
                    map: map,
                    title: place.result.name
                });

                var infowindow = new google.maps.InfoWindow({
                    content: `<div><strong>${place.result.name}</strong><br>
                              ${place.result.formatted_address}<br>
                              Rating: ${place.result.rating ?? 'N/A'}</div>`
                });

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });

                markers.push(marker);
            }
        });

        var markerCluster = new MarkerClusterer(map, markers, {
            imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDevgP5ZJMtLGJba6dTlLBr8Xqiv3dyt_E&callback=initMap" async defer></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

@endsection
