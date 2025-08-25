<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>La Mafia – Seu Estilo, Nosso Corte | Home</title>

  <!-- Tipografia moderna parecida com o mockup -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="assets/logo.png">

  <!-- CSS do projeto -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- =========================================================
       TOPO / NAV
     ========================================================= -->

    <?php include 'partials/topo.php'; ?>


  <main>
    <!-- =========================================================
         CARROSSEL MODERNO COM FADE E OVERLAY
       ========================================================= -->
    <section class="container section">
      <div class="carousel" data-carousel>
        <div class="carousel__track" data-carousel-track>
          <!-- Slide 1 -->
          <div class="carousel__slide active">
            <img src="assets/carrosel1.jpg" alt="Imagem de barbearia 1">
            <div class="carousel__overlay">
              <h2>Estilo Premium</h2>
              <p>Agende Seu Corte Agora</p>
            </div>
          </div>
          <!-- Slide 2 -->
          <div class="carousel__slide">
            <img src="assets/carrosel2.jpg" alt="Imagem de barbearia 2">
            <div class="carousel__overlay">
              <h2>Experiência Única</h2>
              <p>Transforme Seu Visual</p>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel__slide">
            <img src="assets/carrosel3.jpg" alt="Imagem de barbearia 3">
            <div class="carousel__overlay">
              <h2>Agende Conosco</h2>
              <p>Seu Estilo em Primeiro Lugar</p>
            </div>
          </div>
        </div>

        <!-- Controles -->
        <button class="carousel__control prev" aria-label="Slide anterior" data-carousel-prev>&lsaquo;</button>
        <button class="carousel__control next" aria-label="Próximo slide" data-carousel-next>&rsaquo;</button>

        <!-- Dots -->
        <div class="carousel__dots" data-carousel-dots></div>
      </div>
    </section>

    <!-- =========================================================
         HERO / BLOCO PRETO
       ========================================================= -->
    <section class="hero">
      <div class="container">
        <h1>SEJA BEM-VINDO</h1>
        <p class="hero__subtitle">Onde estilo, conforto e cuidado se encontram.</p>

        <div class="grid">
          <a class="tile" href="produto-lista.php" aria-label="Produtos">
            <div class="tile__icon">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 8h12l-1 12H7L6 8zm3 0V6a3 3 0 1 1 6 0v2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </div>
            <span class="tile__label">Produtos</span>
          </a>

          <a class="tile" href="agendamentos.php" aria-label="Agendamentos">
            <div class="tile__icon">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3v3m10-3v3M4 8h16v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8zm3 4h4m-4 4h4m4-4h2m-2 4h2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </div>
            <span class="tile__label">Agendamentos</span>
          </a>

          <a class="tile" href="localizacao.php" aria-label="Localização">
  <div class="tile__icon">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
    </svg>
  </div>
  <span class="tile__label">Localização</span>
</a>


          <a class="tile" href="galeria.php" aria-label="Galeria">
            <div class="tile__icon">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5h16v14H4z" fill="none" stroke="currentColor" stroke-width="2"/><path d="M8 13l3-3 5 6H6l2-3z" fill="currentColor"/></svg>
            </div>
            <span class="tile__label">Galeria</span>
          </a>
        </div>
      </div>
    </section>

    <!-- =========================================================
         FAIXA DOURADA (CTA)
       ========================================================= -->
   <section class="cta-calendar">
  <div class="container cta__inner" style="flex-direction:column;align-items:center;gap:20px;">
    <a class="cta__button" href="agendamentos.php" role="button">AGENDE SEU HORÁRIO</a>

    <div class="calendar">
      <div class="calendar-header">
        <button id="prev-month">&lt;</button>
        <h3 id="month-year"></h3>
        <button id="next-month">&gt;</button>
      </div>
      <div class="calendar-body">
        <div class="calendar-weekdays">
          <div>Dom</div><div>Seg</div><div>Ter</div><div>Qua</div><div>Qui</div><div>Sex</div><div>Sáb</div>
        </div>
        <div class="calendar-days" id="calendar-days"></div>
      </div>
    </div>
  </div>
</section>

<style>
.calendar {
  background: var(--black);
  color: var(--ivory);
  border: 2px solid var(--gold);
  border-radius: 8px;
  padding: 16px;
  width: 100%;
  max-width: 400px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.5);
}
.calendar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 12px;
}
.calendar-header button {
  background: var(--gold);
  border: none;
  color: var(--black);
  padding: 6px 12px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 700;
  transition: transform 0.15s;
}
.calendar-header button:hover{transform: scale(1.05);}
.calendar-weekdays, .calendar-days {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  text-align: center;
}
.calendar-weekdays div {
  font-weight: 700;
  margin-bottom: 8px;
  color: var(--gold);
}
.calendar-days div {
  padding: 10px 0;
  margin: 2px;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.2s, color 0.2s;
}
.calendar-days div:hover {
  background: var(--gold);
  color: var(--black);
}
.calendar-days div.inactive {
  color: #555;
  cursor: default;
}
.calendar-days div.weekend{
  color: var(--gold);
  font-weight: 700;
}
.calendar-days div.today{
  background: var(--gold);
  color: var(--black);
  font-weight: 800;
}
</style>

<script>
const calendarDays = document.getElementById('calendar-days');
const monthYear = document.getElementById('month-year');
const prevBtn = document.getElementById('prev-month');
const nextBtn = document.getElementById('next-month');

let currentDate = new Date();

function renderCalendar(date) {
  const year = date.getFullYear();
  const month = date.getMonth();
  monthYear.textContent = date.toLocaleString('default', { month: 'long', year: 'numeric' });

  const firstDay = new Date(year, month, 1).getDay();
  const lastDate = new Date(year, month + 1, 0).getDate();

  calendarDays.innerHTML = '';

  // Preencher dias vazios antes do 1º dia
  for(let i=0;i<firstDay;i++){
    const empty = document.createElement('div');
    empty.classList.add('inactive');
    calendarDays.appendChild(empty);
  }

  // Preencher os dias do mês
  for(let i=1;i<=lastDate;i++){
    const day = document.createElement('div');
    day.textContent = i;

    // Verifica se é fim de semana
    const dayOfWeek = new Date(year, month, i).getDay();
    if(dayOfWeek === 0 || dayOfWeek === 6) day.classList.add('weekend');

    // Destaca o dia atual
    const today = new Date();
    if(i === today.getDate() && month === today.getMonth() && year === today.getFullYear()){
      day.classList.add('today');
    }

    day.addEventListener('click', () => {
      window.location.href = 'agendamentos.php';
    });

    calendarDays.appendChild(day);
  }
}

prevBtn.addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar(currentDate);
});
nextBtn.addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar(currentDate);
});

renderCalendar(currentDate);
</script>

<br><br>

  </main>

  <!-- =========================================================
       RODAPÉ
     ========================================================= -->
  <?php include 'partials/rodapé.php'; ?>



  <!-- JS do projeto -->
  <script src="js/app.js"></script>
</body>
</html>
