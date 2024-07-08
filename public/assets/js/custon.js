$(document).ready(function () {

  $("#tableLeaders").DataTable({
    responsive: true,
    order: [[0, "desc"]],
    info: false,
    pageLength: 25,
    language: {
      "sEmptyTable": "Nenhum dado disponível na tabela",
      "sInfo": "Mostrando _START_ até _END_ de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
      "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sSearch": "Pesquisar:",
      "sZeroRecords": "Nenhum registro encontrado",
      "oPaginate": {
        "sFirst": "Primeiro",
        "sLast": "Último",
        "sNext": "Próximo",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
      }
    }
  });


  $("#tableCreateLeads").DataTable({
    responsive: true,
    order: [[0, "desc"]],
    info: false,
    pageLength: 10,
    language: {
      "sEmptyTable": "Nenhum dado disponível na tabela",
      "sInfo": "Mostrando _START_ até _END_ de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
      "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sSearch": "Pesquisar:",
      "sZeroRecords": "Nenhum registro encontrado",
      "oPaginate": {
        "sFirst": "Primeiro",
        "sLast": "Último",
        "sNext": "Próximo",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
      }
    }
  });

  // new DataTable('#tableLeaders', {
  //   order: [[3, 'desc']]

  // });

})  
