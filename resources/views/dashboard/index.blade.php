@extends('.master')

@section('title', 'Dashboard')
 <!-- Conteúdo do seu dashboard aqui -->

 <div class="container-button">

@section('content')

<div class="container-content">
  <div class="container-cards">
    <div class="topo-dashboard container-topo">
      <div class="cards-dashboard grafico-clientes">
        <canvas id="clientesAlcancadosChart" width="400" height="200"></canvas>
      </div>
        <div class="cards-dashboard card-campanha-enviada">
          <p>4</p>
          <span>Campanha enviada</span>
        </div>
        <div class="cards-dashboard card-emails-enviados">
          <p>32</p>
          <span>E-mails enviados</span>
        </div>
   
      <div class="cards-dashboard card-atividades-recentes">
        <div class="content">
          <span>Atividade Recentes</span>
          <svg  width="24" height="24" data-name="Layer 1" fill="#835eff" id="Layer_1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><path d="M12,13.41,13.41,12,8.46,7.05,7.05,8.46Zm7.07-8.48A9.93,9.93,0,0,0,12,2H11V6h2V4.06A8,8,0,1,1,6.34,6.34l.71-.7L5.64,4.22l-.71.71A10,10,0,1,0,19.07,19.07a10,10,0,0,0,0-14.14Z"/></svg>
        </div>
        <span>Novo cliente adicionado:  Livraria Sempre Viva</span>
      </div>
    </div>
    <div class="area-pesquisa">
      <div class="content-input">
        <label for="buscarClientes">Buscar Clientes</label>
        <div class="cotainer-input-busca">
          <input id="buscarClientes" class="form-control" type="text" placeholder="Ex: Livrarias em Pernambuco">
          <button id="buscar-leads" class="btn-transparente">buscar</button>
        </div>
      </div>
      <div class="dica-pesquisa">
        <p>Dica de pesquisa</p>
        <span>Informe o tipo de estabelecimentos que mais combina, com seus possíveis leads, ex: Livrarias em Pernambuco.</span>
      </div>
    </div>
    <div class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63223.1501042669!2d-34.88622147538925!3d-7.952685184975916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab3d4aba781a11%3A0xe7fb0e6b58720c12!2sEscola%20Maria%20do%20Carmo!5e0!3m2!1spt-BR!2sbr!4v1717213678189!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <table class="table">
      <thead>
          <tr>
              <th class="checkbox-column"><input style="margin-bottom: 5px;" type="checkbox" id="select-all"></th>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Email</th>
              <th>Endereço</th>
              <th>Setor</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td class="checkbox-column"><input type="checkbox" name="items[]" value="1"></td>
              <td>Livraria Modelo</td>
              <td>9888-85558</td>
              <td>Livrariamodelo@gmail.com</td>
              <td>Rua 20, Rio Doce, Olinda - 54300-050</td>
              <td>Papelaria</td>
          </tr>
          <tr>
              <td class="checkbox-column"><input type="checkbox" name="items[]" value="2" checked></td>
              <td>Livraria Modelo -rafa</td>
              <td>9888-85558</td>
              <td>Livrariamodelo@gmail.com</td>
              <td>Rua 20, Rio Doce, Olinda - 54300-050</td>
              <td>Papelaria</td>
          </tr>
          <tr>
              <td class="checkbox-column"><input type="checkbox" name="items[]" value="3" checked></td>
              <td>Livraria Modelo - joao</td>
              <td>9888-85558</td>
              <td>Livrariamodelo@gmail.com</td>
              <td>Rua 20, Rio Doce, Olinda - 54300-050</td>
              <td>Papelaria</td>
          </tr>
          <tr>
              <td class="checkbox-column"><input type="checkbox" name="items[]" value="4"></td>
              <td>Livraria Modelo -pedro</td>
              <td>9888-85558</td>
              <td>Livrariamodelo@gmail.com</td>
              <td>Rua 20, Rio Doce, Olinda - 54300-050</td>
              <td>Papelaria</td>
          </tr>
          <tr>
              <td class="checkbox-column"><input type="checkbox" name="items[]" value="5"></td>
              <td>Livraria Modelo</td>
              <td>9888-85558</td>
              <td>Livrariamodelo@gmail.com</td>
              <td>Rua 20, Rio Doce, Olinda - 54300-050</td>
              <td>Papelaria</td>
          </tr>
          <tr>
              <td class="checkbox-column"><input type="checkbox" name="items[]" value="6"></td>
              <td>Livraria Modelo</td>
              <td>9888-85558</td>
              <td>Livrariamodelo@gmail.com</td>
              <td>Rua 20, Rio Doce, Olinda - 54300-050</td>
              <td>Papelaria</td>
          </tr>
          <tr>
              <td class="checkbox-column"><input type="checkbox" name="items[]" value="7"></td>
              <td>Livraria Modelo</td>
              <td>9888-85558</td>
              <td>Livrariamodelo@gmail.com</td>
              <td>Rua 20, Rio Doce, Olinda - 54300-050</td>
              <td>Papelaria</td>
          </tr>
      </tbody>
  </table>

  

    
  </div>
  <div class="container-button">
    <button class="btn-padrao">Ir para Mensagens</button>
    <button type="button" class="btn-transparente" data-toggle="modal" data-target="#modalCriarLista">
      Criar Lista
  </button>
  </div>
</div> 

@endsection

<div class="modal fade" id="modalCriarLista" tabindex="-1" aria-labelledby="modalCriarLista" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title sub-title" id="nameModalLabel">Nova Lista de Clientes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="send-selected" method="POST">
                  <div class="form-group">
                      <label for="list-name">Informe o nome da lista</label>
                      <input type="text" class="form-control" id="list-name" name="list_name" placeholder="digite um nome para sua lista" required >
                  </div>
                  <input type="hidden" name="items" id="selected-items">
                  <button type="submit" class="btn-padrao">Salvar</button>
              </form>
          </div>
      </div>
  </div>
</div>


