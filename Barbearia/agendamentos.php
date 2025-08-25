<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lopes Cortes – Agendamento Online | Escolha sua Data e Horário</title>

  <!-- Tipografia moderna parecida com o mockup -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="assets/logo.png">

  <!-- CSS do projeto -->
  <link rel="stylesheet" href="css/agendamento.css">
</head>
<body>
<!-- =========================================================
       TOPO / NAV
     ========================================================= -->

    <?php include 'partials/topo.php'; ?>


  <main class="shell">
  <div class="hero">
    <div>
      <h1>🗓️ Agendamento Online — Lopes Cortes</h1>
      <p>Escolha serviço, data e horário. Depois confirme — envio por SMS/WhatsApp opcional.</p>
    </div>
  </div>

  <div class="card layout" role="application" aria-label="Agendamento">
    <!-- CALENDÁRIO -->
<div class="panel">
  <div class="month-header">
    <button class="icon-btn" id="prevMonth" aria-label="Mês anterior">&lsaquo;</button>
    <div class="month-title" id="monthTitle">Mês</div>
    <button class="icon-btn" id="nextMonth" aria-label="Próximo mês">&rsaquo;</button>
  </div>
  <div class="weekdays" id="weekdays"></div>
  <div class="days" id="daysGrid" role="grid" aria-label="Dias do mês"></div>
</div>


    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="summary">
        <h3>Resumo do Agendamento</h3>
        <p id="selectedInfo">Selecione uma data e um horário</p>
      </div>

      <div class="time-block">
        <strong style="display:block;margin-bottom:8px;color:#fff">Horários disponíveis</strong>
        <div class="time-grid" id="timeGrid"></div>
      </div>

      <div class="notes">
        <label for="notes" style="font-weight:700;color:#fff">Observações</label>
        <textarea id="notes" placeholder="Ex.: preferência por barbeiro X, alergias..."></textarea>
      </div>

      <div class="cta">
        <a id="confirmBtn" class="btn-primary" target="_blank">Confirmar Agendamento</a>
        <script>
        // Função para montar mensagem do agendamento
        function montarMensagemWhatsApp() {
            const info = document.getElementById('selectedInfo').innerText;
            const obs = document.getElementById('notes').value;
            let mensagem = "Olá! Gostaria de confirmar meu agendamento:\n";
            mensagem += info ? info + "\n" : "";
            mensagem += obs ? "Observações: " + obs : "";
            return encodeURIComponent(mensagem);
        }

        // Redireciona para WhatsApp ao clicar no botão
        document.getElementById('confirmBtn').addEventListener('click', function(e) {
            e.preventDefault();
            const selectedDay = document.querySelector('.days .selected');
            const selectedTime = document.querySelector('.time-grid .selected');
            if (!selectedDay || !selectedTime) {
          alert('Selecione uma data e um horário antes de confirmar.');
          return;
            }
            const numero = "5511988982515"; // coloque o número do WhatsApp do estabelecimento
            const mensagem = montarMensagemWhatsApp();
            const link = `https://wa.me/${numero}?text=${mensagem}`;
            window.open(link, '_blank');
        });
        </script>
        
        <button id="clearBtn" class="btn-secondary">Limpar seleção</button>
        <script>
        document.getElementById('clearBtn').addEventListener('click', function() {
            // Limpa seleção de dia
            const selectedDay = document.querySelector('.days .selected');
            if (selectedDay) selectedDay.classList.remove('selected');

            // Limpa seleção de horário
            const selectedTime = document.querySelector('.time-grid .selected');
            if (selectedTime) selectedTime.classList.remove('selected');

            // Limpa observação
            document.getElementById('notes').value = '';

            // Atualiza resumo
            document.getElementById('selectedInfo').innerText = 'Selecione uma data e um horário';
        });
        </script>
        <div id="alertArea" aria-live="polite"></div>
      </div>
    </aside>
  </div>
</main>

<script src="js/agendamento.js"></script>

<?php
include 'partials/rodapé.php';
?>



<script src="js/app.js"></script>
</body>
</html> 