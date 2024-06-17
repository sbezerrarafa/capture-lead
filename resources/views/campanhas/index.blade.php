@extends('.master')

@section('title', 'Campanhas')

@section('content')

<div class="container-content">
  <h2 class="titles">Campanhas</h2>
  <div class="card container-campanha">
    <div class="card-header">
      Criar Campanha
    </div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <label for="campaignName">Nome da Campanha</label>
          <input type="text" class="form-control" id="campaignName" placeholder="Nome da Campanha">
        </div>
        <div class="form-group">
          <label for="campaignMessage">Conteúdo da Mensagem</label>
          <textarea class="form-control" id="campaignMessage" rows="3" placeholder="Conteúdo da Mensagem"></textarea>
        </div>
        <div class="form-group">
          <label for="campaignChannel">Canal</label>
          <select class="form-control" id="campaignChannel">
            <option>Whatsapp</option>
            <option>Email</option>
            <option>SMS</option>
          </select>
        </div>
        <div class="form-group">
          <label for="clientList">Selecione a Lista de Clientes</label>
          <select class="form-control" id="clientList">
            <option value="1">Lista de Clientes 1</option>
            <option value="2">Lista de Clientes 2</option>
            <option value="3">Lista de Clientes 3</option>
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
          <tr>
              <td>Campanha 1</td>
              <td>01/06/2024</td>
              <td>Whatsapp</td>
              <td>Ativa</td>
              <td>
                  <button class="btn btn-sm btn-info">Reenviar</button>
                  <button class="btn btn-sm btn-danger">Excluir</button>
              </td>
          </tr>
          <tr>
              <td>Campanha 2</td>
              <td>15/05/2024</td>
              <td>Email</td>
              <td>Concluída</td>
              <td>
                  <button class="btn btn-sm btn-info">Reenviar</button>
                  <button class="btn btn-sm btn-danger">Excluir</button>
              </td>
          </tr>
          <!-- Adicione mais campanhas conforme necessário -->
      </tbody>
  </table>
  </div>
</div>

@endsection