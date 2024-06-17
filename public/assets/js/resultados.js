// Dados fictícios para os gráficos
const campaignData = {
  labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
  datasets: [{
    label: 'Número de Campanhas',
    data: [12, 19, 3, 5, 2, 3],
    backgroundColor: 'rgba(54, 162, 235, 0.2)',
    borderColor: 'rgba(54, 162, 235, 1)',
    borderWidth: 1
  }]
};

const messageData = {
  labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
  datasets: [{
    label: 'Mensagens Recebidas',
    data: [2, 29, 5, 5, 20, 3],
    backgroundColor: 'rgba(255, 206, 86, 0.2)',
    borderColor: 'rgba(255, 206, 86, 1)',
    borderWidth: 1
  }]
};

const configCampaignChart = {
  type: 'bar',
  data: campaignData,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
};

const configMessageChart = {
  type: 'bar',
  data: messageData,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
};

window.onload = function () {
  const ctxCampaign = document.getElementById('campaignChart').getContext('2d');
  const campaignChart = new Chart(ctxCampaign, configCampaignChart);

  const ctxMessage = document.getElementById('messageChart').getContext('2d');
  const messageChart = new Chart(ctxMessage, configMessageChart);
}

// Função de exportação CSV
function exportCSV() {
  const selectedList = document.getElementById('leadList').value;
  // Dados fictícios para exportação
  const data = [
    ['Nome', 'Email', 'Telefone'],
    ['João Silva', 'joao@exemplo.com', '123456789'],
    ['Maria Lima', 'maria@exemplo.com', '987654321']
  ];

  let csvContent = "data:text/csv;charset=utf-8,";
  data.forEach(function (rowArray) {
    let row = rowArray.join(",");
    csvContent += row + "\r\n";
  });

  const encodedUri = encodeURI(csvContent);
  const link = document.createElement("a");
  link.setAttribute("href", encodedUri);
  link.setAttribute("download", selectedList + ".csv");
  document.body.appendChild(link);
  link.click();
}