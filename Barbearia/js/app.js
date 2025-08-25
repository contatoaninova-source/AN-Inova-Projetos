// =============================================================
// APP.JS — Interações da landing
// - Menu lateral (drawer) no mobile
// - Carrossel com fade, autoplay, setas e dots
// - Busca animada
// =============================================================

/* --------------------------- Drawer (menu mobile) --------------------------- */
(() => {
  const drawer = document.getElementById('drawer');                 // Pega o elemento do drawer (menu lateral)
  const panel = drawer.querySelector('.drawer__panel');             // Pega o painel interno do drawer
  const openers = document.querySelectorAll('[data-open-drawer]');  // Botões que abrem o drawer
  const closers = drawer.querySelectorAll('[data-close-drawer], .drawer__backdrop'); // Botões e backdrop que fecham
  let lastFocused = null;                                           // Guarda último elemento focado para retornar foco

  function open() {
    lastFocused = document.activeElement;                           // Salva o último elemento focado
    drawer.classList.add('drawer--open');                           // Adiciona classe para abrir drawer
    drawer.setAttribute('aria-hidden', 'false');                    // Acessibilidade: indica drawer visível
    panel.querySelector('a,button')?.focus();                       // Foca no primeiro link ou botão do painel
    document.documentElement.style.overflow = 'hidden';             // Bloqueia scroll do body
  }

  function close() {
    drawer.classList.remove('drawer--open');                        // Remove classe que abre drawer
    drawer.setAttribute('aria-hidden', 'true');                     // Acessibilidade: indica drawer fechado
    document.documentElement.style.overflow = '';                   // Libera scroll do body
    lastFocused?.focus();                                           // Retorna foco ao elemento anterior
  }

  openers.forEach(btn => btn.addEventListener('click', open));      // Adiciona evento de abrir drawer nos botões
  closers.forEach(btn => btn.addEventListener('click', close));     // Adiciona evento de fechar drawer nos botões/backdrop
  window.addEventListener('keydown', (e)=>{ if(e.key === 'Escape') close(); }); // Fecha drawer ao apertar ESC
})();

/* -------------------------------- Carrossel com fade -------------------------------- */
(() => {
  const root = document.querySelector('[data-carousel]');           // Pega container do carrossel
  if(!root) return;                                                // Se não existir, sai

  const slides = Array.from(root.querySelectorAll('[data-carousel-track] > *')); // Pega todos os slides
  const prev = root.querySelector('[data-carousel-prev]');          // Botão slide anterior
  const next = root.querySelector('[data-carousel-next]');          // Botão próximo slide
  const dotsWrap = root.querySelector('[data-carousel-dots]');      // Container dos dots

  let index = 0;                                                    // Índice do slide atual
  let timer = null;                                                 // Timer do autoplay

  // Cria os dots (botões de navegação)
  slides.forEach((_, i) => {
    const b = document.createElement('button');                     // Cria botão
    b.type = 'button';
    b.setAttribute('aria-label', `Ir para slide ${i+1}`);          // Acessibilidade
    b.addEventListener('click', () => goTo(i));                     // Ao clicar, vai para o slide i
    dotsWrap.appendChild(b);                                        // Adiciona no container de dots
  });

  function update() {
    slides.forEach((s,i) => {
      s.classList.toggle('active', i === index);                   // Ativa somente o slide atual
    });
    dotsWrap.querySelectorAll('button').forEach((d,i) => {
      d.classList.toggle('active', i === index);                   // Ativa o dot correspondente
      d.setAttribute('aria-current', i===index ? 'true' : 'false');// Acessibilidade
    });
  }

  function goTo(i){
    index = (i + slides.length) % slides.length;                   // Garante índice válido
    update();                                                       // Atualiza slides e dots
    restartAutoplay();                                              // Reinicia autoplay
  }

  function nextSlide(){ goTo(index+1); }                             // Próximo slide
  function prevSlide(){ goTo(index-1); }                             // Slide anterior

  function startAutoplay(){ timer = setInterval(nextSlide, 4500); }  // Inicia autoplay (4.5s)
  function stopAutoplay(){ clearInterval(timer); timer = null; }     // Para autoplay
  function restartAutoplay(){ stopAutoplay(); startAutoplay(); }     // Reinicia autoplay

  next.addEventListener('click', nextSlide);                         // Evento próximo
  prev.addEventListener('click', prevSlide);                         // Evento anterior
  root.addEventListener('mouseenter', stopAutoplay);                 // Para autoplay ao passar mouse
  root.addEventListener('mouseleave', startAutoplay);               // Reinicia autoplay ao sair
  root.addEventListener('touchstart', stopAutoplay, {passive:true}); // Para autoplay no touch
  root.addEventListener('touchend', startAutoplay, {passive:true});  // Reinicia autoplay no touch

  update(); startAutoplay();                                         // Inicializa o carrossel
})();

/* --------------------------- Busca animada --------------------------- */
(() => {
  const searchWrapper = document.querySelector('.search-wrapper');   // Container da busca
  const searchBtn = searchWrapper.querySelector('.search-btn');      // Botão lupa
  const searchInput = searchWrapper.querySelector('.search-input');  // Campo de input

  // Abrir/fechar busca ao clicar na lupa
  searchBtn.addEventListener('click', () => {
    searchWrapper.classList.toggle('active');                        // Alterna classe active
    if(searchWrapper.classList.contains('active')){
      searchInput.focus();                                           // Foca no input ao abrir
    }
  });

  // Fechar busca ao clicar fora do container
  document.addEventListener('click', (e) => {
    if(!searchWrapper.contains(e.target)){
      searchWrapper.classList.remove('active');                      // Remove active
    }
  });

  // Fechar busca ao apertar ESC
  document.addEventListener('keydown', (e) => {
    if(e.key === 'Escape'){
      searchWrapper.classList.remove('active');
    }
  });
})();
