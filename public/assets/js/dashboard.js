const dadosClientes = [50, 100, 150, 200, 250, 300];

// Obtendo os nomes dos últimos 6 meses
const meses = [];
for (let i = 5; i >= 0; i--) {
  const date = new Date();
  date.setMonth(date.getMonth() - i);
  meses.push(date.toLocaleString('default', { month: 'long' }));
}

const chartElement = document.getElementById('clientesAlcancadosChart');

if (chartElement) {
  const ctx = chartElement.getContext('2d');
  const clientesAlcancadosChart = new Chart(ctx, {

    type: 'line',
    data: {
      labels: meses,
      datasets: [{
        label: 'Clientes Alcançados',
        data: dadosClientes,
        borderColor: 'rgba(153, 102, 255, 1)',
        backgroundColor: 'rgba(153, 102, 255, 0.2)',
        fill: true,
        tension: 0.1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          max: 500
        }
      }
    }
  });
}

//envio de itens da tabela

document.getElementById('select-all').addEventListener('click', function (event) {
  let checkboxes = document.querySelectorAll('input[name="items[]"]');
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = event.target.checked;
  });
});

document.querySelector('button[data-target="#modalCriarLista"]').addEventListener('click', function () {
  let selectedItems = [];
  document.querySelectorAll('input[name="items[]"]:checked').forEach(function (checkbox) {
    let row = checkbox.closest('tr');
    let item = {
      nome: row.cells[1].textContent,
      telefone: row.cells[2].textContent,
      email: row.cells[3].textContent
    };
    selectedItems.push(item);
  });

  if (selectedItems.length > 0) {
    document.getElementById('selected-items').value = JSON.stringify(selectedItems);
  } else {
    alert('Por favor, selecione pelo menos um item.');
    return false;
  }
});

document.getElementById('send-selected').addEventListener('submit', function (event) {
  event.preventDefault();

  let selectedItems = JSON.parse(document.getElementById('selected-items').value);
  let listName = document.getElementById('list-name').value;

  // Simular envio e mostrar no console
  console.log({ items: selectedItems, list_name: listName });
  alert('Itens enviados com sucesso! Veja o console para detalhes.');
  $('#modalCriarLista').modal('hide');
});