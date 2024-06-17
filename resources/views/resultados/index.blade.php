@extends('master')
@section('title','Resulados')

@section('content')

<div class="container-content">
  <h2 class="titles">Resultados</h2>
    <div>
      <h5 class="mt-4 mb-4">Exportação de Dados</h5>
      <div class="content-exportar-lista">

        <div class="form-group">
          <label for="clientList">Selecione a Lista de Leads</label>
          <select class="form-control" id="leadList">
            <option value="materialEscolar">Clientes Material Escolar</option>
            <option value="2">Lista de Clientes 2</option>
            <option value="3">Lista de Clientes 3</option>
          </select>
        </div>
        <button onclick="exportCSV()" class="btn-transparente mt-3">Exportar tabela</button>
      </div>
    </div>
    <div>
      <h2 class="mt-5 titles mb-4">Gráficos de Desempenho</h2>
      <div class="container-graficos-resultados row">

        <div class="cards-dashboard col-md-5 ">
          <canvas id="campaignChart"></canvas>
          </div>
        <div class="cards-dashboard col-md-5">
          <canvas id="messageChart"></canvas>
          </div>
        
      </div>
    </div>
</div>  

@endsection