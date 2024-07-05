@extends('master')

@section('title', 'Campanhas')

@section('content')

<div class="container-content">
  <h2 class="titles">Campanhas</h2>
  <div class="card container-campanha">
    <div class="card-header">
      Criar Campanha
    </div>
    <div class="card-body">
      <form action="{{ route('campanhas.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="campaignName">Nome da Campanha</label>
          <input type="text" class="form-control" id="campaignName" name="nome" placeholder="Nome da Campanha" required>
        </div>
        <div class="form-group">
          <label for="campaignMessage">Conteúdo da Mensagem</label>
          <textarea class="form-control" id="campaignMessage" name="conteudo" rows="3" placeholder="Conteúdo da Mensagem" required></textarea>
        </div>
        <div class="form-group">
          <label for="campaignChannel">Canal</label>
          <select class="form-control" id="campaignChannel" name="canal" required>
            <option value="Whatsapp">Whatsapp</option>
            <option value="Email">Email</option>
            <option value="SMS">SMS</option>
          </select>
        </div>
        <div class="form-group">
          <label for="clientList">Selecione a Lista de Clientes</label>
          <select class="form-control" id="clientList" name="lead_id" required>
            @foreach($leads as $lead)
              <option value="{{ $lead->hash_lista }}">{{ $lead->lista_nome }}</option>
            @endforeach
          </select>
        </div>
        <div class="container-button">
          <button type="submit" class="btn-transparente">Criar Campanha</button>
        </div>
      </form>
    </div>
  </div>
  <div class="mt-4">
    <h2 class="titles">Histórico de Campanhas</h2>
    <table class="table table-striped">
      <thead>
          <tr>
              <th scope="col">Nome da Campanha</th>
              <th scope="col">Data de Criação</th>
              <th scope="col">Canal</th>
              <th scope="col">Status</th>
              <th scope="col">Ações</th>
          </tr>
      </thead>
      <tbody>
          @foreach($campanhas as $campanha)
            <tr>
                <td>{{ $campanha->nome }}</td>
                <td>{{ $campanha->created_at->format('d/m/Y') }}</td>
                <td>{{ $campanha->canal }}</td>
                <td>{{ $campanha->status }}</td>
                <td>
                    <button class="btn btn-sm btn-info">Reenviar</button>
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </td>
            </tr>
          @endforeach
      </tbody>
  </table>
  </div>
</div>

@endsection
