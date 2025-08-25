<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lopes Cortes – Localização | Venha nos Visitar</title>

  <!-- Tipografia moderna parecida com o mockup -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="assets/logo.png">

  <!-- CSS do projeto -->
  
</head>
<body>
<!-- =========================================================
       TOPO / NAV
     ========================================================= -->

    <?php include 'partials/topo.php'; ?>

<main>
  <!-- HERO / BANNER -->
  <section class="hero">
    <div class="container">
      <h1>Como Chegar</h1>
      <p class="hero__subtitle">Veja a localização da nossa barbearia e planeje sua visita.</p>
    </div>
  </section>

  <!-- MAPA -->
  <section class="container section">
    <div class="map-wrapper" style="width:100%;height:450px;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.3);">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.123456!2d-46.123456!3d-23.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce1234567890ab%3A0x123456abcdef!2sBarbearia%20Lopes%20Cortes!5e0!3m2!1spt-BR!2sbr!4v1692720000000!5m2!1spt-BR!2sbr" 
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </section>
</main>

<?php
include 'partials/rodapé.php';
?>

<!-- JS do site -->
<script src="js/app.js"></script>