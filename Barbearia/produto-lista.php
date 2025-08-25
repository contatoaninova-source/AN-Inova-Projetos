<?php
// produto-lista.php — Página de produtos

include 'conexao.php';
?>


<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lopes Cortes – Produtos | Seu Estilo em Primeiro Lugar</title>

  <!-- Tipografia moderna parecida com o mockup -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="assets/logo.png">

  <!-- CSS do projeto -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!--Topo com include-->
  <?php include 'partials/topo.php'; ?>



<main>
  <!-- HERO / BANNER -->
  <section class="hero">
    <div class="container">
      <h1>Nossos Produtos</h1>
      <p class="hero__subtitle">Tudo que você precisa para cuidar do seu cabelo com estilo.</p>
    </div>
  </section>

  <!-- LISTA DE PRODUTOS -->
  <section class="container section">
    <div class="product-list">
      <?php
      $sql = "SELECT id, nome, preco, imagem FROM produtos ORDER BY nome ASC";
      $result = $conexao->query($sql);

      if ($result && $result->num_rows > 0) {
          while ($produto = $result->fetch_assoc()) { ?>
            <div class="product-card">
              <!-- Imagem do produto -->
              <img src="produtos_uploads/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">

              <!-- Overlay com botão -->
              <div class="product-card__overlay">
                <a class="product-card__button" href="produto-detalhes.php?id=<?php echo $produto['id']; ?>">Ver Detalhes</a>
              </div>

              <!-- Conteúdo abaixo da imagem -->
              <div class="product-card__content">
                <span class="product-card__name"><?php echo $produto['nome']; ?></span>
                <span class="product-card__price">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></span>
              </div>
            </div>
          <?php }
      } else {
          echo "<p>Nenhum produto encontrado.</p>";
      }
      ?>
    </div>
  </section>
</main>

<?php include 'partials/rodapé.php'; ?>
<!-- JS do site -->
<script src="/Barbearia/js/app.js"></script>
