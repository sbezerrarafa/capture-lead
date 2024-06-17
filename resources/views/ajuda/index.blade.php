@extends('master')
@section('title','Suporte')

@section('content')

<div class="container-contents">
  <h2 class="titles">Ajuda e Suporte</h2>
  <div class="container-perguntas">
    <h5>Pergutas Frequentes</h5>
      <div class="faq-item">
          <h5>Como faço para realizar uma pesquisa de clientes?</h5>
          <p>Para realizar uma pesquisa de clientes, vá até a seção "Dashboard" no menu lateral, insira os critérios de pesquisa desejados (como localização ou setor de atividade) e clique no botão "Pesquisar". Os resultados serão exibidos em um mapa interativo e em uma lista detalhada.</p>
      </div>
      <div class="faq-item">
          <h5>Como posso enviar mensagens em massa para os clientes capturados?</h5>
          <p>Após realizar uma pesquisa e selecionar os clientes desejados, vá até a seção "Campanhas". Escreva a mensagem que deseja enviar, selecione o canal de envio (WhatsApp ou email) e clique no botão "Enviar". A mensagem será enviada para todos os clientes selecionados.</p>
      </div>
      <div class="faq-item">
          <h5>Quais são os benefícios de usar a plataforma?</h5>
          <p>Os principais benefícios de usar a plataforma incluem:</p>
          <ul>
              <li>Integração com a API do Google Maps para fácil acesso a dados de clientes potenciais.</li>
              <li>Automatização de mensagens para economizar tempo e aumentar a eficiência.</li>
              <li>Suporte para envio de mensagens via WhatsApp e email, garantindo maior alcance.</li>
              <li>Análises detalhadas para acompanhar o desempenho das suas campanhas.</li>
          </ul>
      </div>
      <div class="faq-item">
          <h5>Como posso visualizar as campanhas que enviei?</h5>
          <p>Você pode visualizar suas campanhas na seção "Campanhas" do menu lateral. Nessa página, você encontrará uma lista de todas as campanhas enviadas, com detalhes sobre o desempenho, como taxa de abertura e cliques.</p>
      </div>
      <div class="faq-item">
          <h5>Posso personalizar as mensagens enviadas?</h5>
          <p>Sim, você pode personalizar as mensagens enviadas na seção "Campanhas". Basta escrever a mensagem desejada no campo apropriado antes de enviá-la. Além disso, você pode criar e salvar templates de mensagens para reutilização na seção "Campanhas".</p>
      </div>
      <div class="faq-item">
          <h5>Como posso acessar relatórios de desempenho?</h5>
          <p>Os relatórios de desempenho estão disponíveis na seção "Análise e Relatórios" do menu lateral. Aqui, você pode criar relatórios personalizados e visualizar gráficos de desempenho das suas campanhas e do crescimento da base de clientes.</p>
      </div>
      <div class="faq-item">
          <h5>Como faço para configurar minha conta e preferências?</h5>
          <p>Para configurar sua conta e preferências, acesse a seção "Configurações" no menu lateral. Nessa página, você pode atualizar suas informações de perfil, configurar integrações com outras ferramentas e APIs, e personalizar templates de mensagens e preferências de envio.</p>
      </div>
      <div class="faq-item">
          <h5>Como entrar em contato com o suporte?</h5>
          <p>Se precisar de ajuda, você pode acessar a seção "Ajuda e Suporte" no menu lateral. Aqui, você encontrará artigos de ajuda, FAQs, tutoriais e vídeos explicativos. Se precisar de assistência adicional, você pode usar o formulário de contato ou chat para falar com o suporte técnico.</p>
      </div>
      <div class="faq-item">
          <h5>Quais são as opções de integração disponíveis?</h5>
          <p>A plataforma permite integrar com várias ferramentas e APIs, incluindo a API do Google Maps, serviços de email e WhatsApp. Para configurar essas integrações, acesse a seção "Configurações" e siga as instruções fornecidas.</p>
      </div>
  </div>

  <div class="row">

    <div class="fale-conosco col-md-6">
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
          <div class="container-button">
            <button class="btn-padrao">Enviar</button>
          </div>
        <form> 
      </div>
    </div>
    <div class="video-suporte col-md-6">
      <h3>Tutorial</h3>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/L5R_ZYo-_68?si=Up8p5cW9MK8okhjB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
  </div>
</div>

@endsection