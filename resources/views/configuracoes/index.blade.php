@extends('master')
@section('title','Configurações')

@section('content')

<div class="container-contents">
  <h2 class="titles">Configurações da Conta</h2>
  <h5>Perfil do Usuário</h5>
  <div class="card-body">
    <form>
      <div class="form-group">
        <label for="usuario">Nome do usuário</label>
        <input type="text" class="form-control" id="usuario" placeholder="Nome do usuário">
      </div>
      <div class="form-group">
        <label for="email-usuario">Email usuário</label>
        <input type="email" class="form-control" id="email-usuario" placeholder="Email usuário">
      </div>
      <div class="form-group">
        <label for="senha">Nova senha</label>
        <input type="password" class="form-control" id="senha" placeholder="Digite uma nova senha">
      </div>
      <div class="container-button">
        <button class="btn-padrao">Atualizar informações</button>
      </div>
    </form>
  </div>    
  <div class="containeir-plano-atual">

    <h4>Plano Atual</h4>
    <div class="plano-atual">
        <p><strong>Plano:</strong> Básico</p>
        <p><strong>Limite de Mensagens:</strong> 1000 por mês</p>
        <p><strong>Suporte:</strong> Email</p>
        <button onclick="upgradePlan()" class="btn-transparente">Fazer Upgrade</button>
    </div>
  </div>
</div>

@endsection