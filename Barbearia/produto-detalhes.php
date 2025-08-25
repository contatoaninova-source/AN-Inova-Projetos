

<?php
// produto-detalhes.php — Página de detalhes aprimorada

include 'conexao.php';
include 'partials/topo.php';

// Verifica ID do produto
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<p>Produto não encontrado.</p>";
    include 'partials/rodapé.php';
    exit;
}

$id = intval($_GET['id']);

// Consulta produto
$sql = "SELECT nome, preco, descricao, imagem FROM produtos WHERE id = $id";
$result = $conexao->query($sql);

if ($result->num_rows == 0) {
    echo "<p>Produto não encontrado.</p>";
    include 'partials/rodapé.php';
    exit;
}

$produto = $result->fetch_assoc();

// Para exemplo: miniaturas adicionais (pode ser do banco)
$thumbnails = [
    $produto['imagem'], // principal
    'produtos_uploads/gel1.jpg',
    'produtos_uploads/pasta1.jpg'
];
?>

<main>
  <!-- DETALHES DO PRODUTO -->
  <section class="container section">
    <div class="product-detail">

      <!-- GALERIA -->
      <div class="product-detail__gallery">
        <img src="produtos_uploads/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" class="main-image" id="mainImage">
        
        <div class="thumbnails">
          <?php foreach($thumbnails as $thumb): ?>
            <img src="<?php echo $thumb; ?>" class="thumb" onclick="changeMainImage(this)" alt="Miniatura">
          <?php endforeach; ?>
        </div>
      </div>

      <!-- INFORMAÇÕES -->
      <div class="product-detail__info">
        <h1><?php echo $produto['nome']; ?></h1>
        <p class="product-detail__price">R$ <?php echo number_format($produto['preco'],2,',','.'); ?></p>
        <p class="product-detail__description"><?php echo $produto['descricao']; ?></p>

        <div class="product-detail__actions">
          <a href="produto-lista.php" class="cta__button">Voltar para Produtos</a>
          <a href="#" class="cta__button btn-secondary">Agendar Agora</a>
        </div>
      </div>

    </div>
  </section>

  <!-- PRODUTOS RELACIONADOS -->
  <section class="container section">
    <h2>Produtos Relacionados</h2>
    <div class="product-list">
      <?php
      $sql2 = "SELECT id, nome, preco, imagem FROM produtos WHERE id != $id LIMIT 4";
      $res2 = $conexao->query($sql2);
      if ($res2 && $res2->num_rows > 0) {
          while ($p = $res2->fetch_assoc()) { ?>
            <div class="product-card">
              <img src="produtos_uploads/<?php echo $p['imagem']; ?>" alt="<?php echo $p['nome']; ?>">
              <div class="product-card__overlay">
                <a href="produto-detalhes.php?id=<?php echo $p['id']; ?>" class="product-card__button">Ver Detalhes</a>
              </div>
              <div class="product-card__content">
                <span class="product-card__name"><?php echo $p['nome']; ?></span>
                <span class="product-card__price">R$ <?php echo number_format($p['preco'],2,',','.'); ?></span>
              </div>
            </div>
          <?php }
      } ?>
    </div>
  </section>
</main>

<script>
// Troca a imagem principal ao clicar na miniatura
function changeMainImage(thumb) {
  document.getElementById('mainImage').src = thumb.src;

  // Atualiza estado ativo
  document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
  thumb.classList.add('active');
}
</script>

<?php include 'partials/rodapé.php'; ?>
<!-- JS do site -->
<script src="js/script.js"></script>