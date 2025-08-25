<?php
// partials/topo.php — Cabeçalho / topbar
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Fonte Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
  
  <!-- CSS -->
  <link rel="stylesheet" href="/Barbearia/css/style.css"> <!-- Caminho absoluto da raiz -->

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/Barbearia/assets/logo.png">
</head>
<body>
<header class="topbar">
  <div class="container topbar__inner">
    <!-- Logo -->
    <a class="brand" href="/Barbearia/index.php" aria-label="Página inicial">
      <img src="/Barbearia/assets/logo.png" alt="Logo Lopes Cortes">
    </a>

    <!-- Navegação desktop -->
    <nav class="nav-desktop">
      <ul>
        <li><a href="/Barbearia/index.php">Home</a></li>
        <li><a href="/Barbearia/produto-lista.php">Produtos</a></li>
        <li><a href="/Barbearia/agendamentos.php">Agendamentos</a></li>
        <li><a href="/Barbearia/localizacao.php">Localização</a></li>
        <li><a href="/Barbearia/galeria.php">Galeria</a></li>
      </ul>
    </nav>

    <!-- Ações direita -->
    <div class="actions">
      <!-- Busca -->
      <div class="search-wrapper">
        <button class="icon-btn search-btn" aria-label="Buscar" title="Buscar">
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M21 21l-4.2-4.2m1.2-5.6A7.4 7.4 0 1 1 10.6 3a7.4 7.4 0 0 1 7.4 7.4z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </button>
        <input type="text" class="search-input" placeholder="Digite sua busca..." aria-label="Campo de busca">
      </div>

      <!-- Hambúrguer mobile -->
      <button class="icon-btn hamburger" aria-label="Abrir menu" aria-expanded="false" aria-controls="drawer" data-open-drawer>
        <span class="hamburger__bar"></span>
        <span class="hamburger__bar"></span>
        <span class="hamburger__bar"></span>
      </button>
    </div>
  </div>

  <!-- Drawer mobile -->
  <nav id="drawer" class="drawer" aria-hidden="true" aria-label="Menu">
    <div class="drawer__panel" role="dialog" aria-modal="true" aria-label="Menu de navegação">
      <button class="icon-btn drawer__close" aria-label="Fechar menu" data-close-drawer>
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path d="M6 6l12 12M18 6L6 18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>
      <ul class="drawer__nav">
        <li><a href="/Barbearia/index.php">Home</a></li>
        <li><a href="/Barbearia/produto-lista.php">Produtos</a></li>
        <li><a href="/Barbearia/agendamentos.php">Agendamentos</a></li>
        <li><a href="/Barbearia/localizacao.php">Localização</a></li>
        <li><a href="/Barbearia/galeria.php">Galeria</a></li>
      </ul>
    </div>
    <div class="drawer__backdrop" data-close-drawer></div>
  </nav>
</header>
