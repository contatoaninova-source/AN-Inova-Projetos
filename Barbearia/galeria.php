<?php
// galeria.php — Página da galeria
include 'conexao.php';

// Consulta todas as imagens da galeria (Estrutura e Cortes)
$sql = "SELECT g.id, g.url, g.alt_text, t.nome AS tipo_nome
        FROM galeria g
        JOIN tipos_galeria t ON g.tipo_id = t.id
        ORDER BY g.id DESC";
$result = $conexao->query($sql);

// Organiza imagens por tipo (padroniza nomes em lowercase)
$galeria = ['estrutura'=>[], 'cortes'=>[]];
if ($result && $result->num_rows > 0) {
    while ($img = $result->fetch_assoc()) {
        $tipo = strtolower($img['tipo_nome']); // garante lowercase
        $galeria[$tipo][] = $img;
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lopes Cortes – Galeria | Seu Estilo em Primeiro Lugar</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="assets/logo.png">
<link rel="stylesheet" href="css/style.css">

<style>
/* ===== Galeria ===== */
.tabs { display:flex; justify-content:center; gap:10px; margin-bottom:16px; }
.tab-btn { background:#121416; color:#cbd5e1; border:1px solid rgba(255,255,255,0.05); padding:10px 20px; border-radius:12px; font-weight:700; cursor:pointer; transition:0.3s; }
.tab-btn.active { background:#a4874f; color:#000; }

.tab-content { display:none; }
.tab-content.active { display:grid; grid-template-columns:repeat(auto-fill,minmax(200px,1fr)); gap:16px; }

.gallery-card { overflow:hidden; border-radius:12px; position:relative; cursor:pointer; transition:transform 0.3s, box-shadow 0.3s; border:1px solid rgba(255,255,255,0.02); }
.gallery-card img { width:100%; display:block; object-fit:cover; transition:transform 0.3s; }
.gallery-card:hover img { transform:scale(1.05); }
.gallery-card:hover { box-shadow:0 10px 20px rgba(0,0,0,0.5); }

/* Lightbox */
.lightbox { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.85); align-items:center; justify-content:center; z-index:3000; }
.lightbox.active { display:flex; }
.lightbox-img { max-width:90%; max-height:90%; border-radius:12px; }
.lightbox .close { position:absolute; top:20px; right:30px; font-size:40px; color:#fff; cursor:pointer; }
</style>
</head>
<body>

<?php include 'partials/topo.php'; ?>

<main class="shell">
  <section class="gallery">
    <h1>Galeria</h1>

    <!-- Abas Estrutura / Cortes -->
    <div class="tabs">
      <button class="tab-btn active" data-tab="estrutura">Estrutura</button>
      <button class="tab-btn" data-tab="cortes">Cortes</button>
    </div>

    <!-- Conteúdo da aba Estrutura -->
    <div class="tab-content active" id="estrutura">
      <?php if(!empty($galeria['estrutura'])): ?>
        <?php foreach($galeria['estrutura'] as $img): ?>
          <div class="gallery-card">
            <img src="galeria_uploads/<?= $img['url'] ?>" alt="<?= $img['alt_text'] ?>" data-full="galeria_uploads/<?= $img['url'] ?>">
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Nenhuma imagem encontrada para Estrutura.</p>
      <?php endif; ?>
    </div>

    <!-- Conteúdo da aba Cortes -->
    <div class="tab-content" id="cortes">
      <?php if(!empty($galeria['cortes'])): ?>
        <?php foreach($galeria['cortes'] as $img): ?>
          <div class="gallery-card">
            <img src="galeria_uploads/<?= $img['url'] ?>" alt="<?= $img['alt_text'] ?>" data-full="galeria_uploads/<?= $img['url'] ?>">
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Nenhuma imagem encontrada para Cortes.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- Lightbox -->
  <div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <img class="lightbox-img" src="" alt="">
  </div>
</main>

<?php include 'partials/rodapé.php'; ?>

<script src="js/app.js"></script>
<script>
// Abas da Galeria
const tabButtons = document.querySelectorAll('.tab-btn');
const tabContents = document.querySelectorAll('.tab-content');

tabButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const tab = btn.dataset.tab;
    tabButtons.forEach(b => b.classList.remove('active'));
    tabContents.forEach(c => c.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById(tab).classList.add('active');
  });
});

// Lightbox
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.querySelector('.lightbox-img');
const lightboxClose = document.querySelector('.lightbox .close');

document.querySelectorAll('.gallery-card img').forEach(img => {
  img.addEventListener('click', () => {
    lightbox.classList.add('active');
    lightboxImg.src = img.dataset.full;
    lightboxImg.alt = img.alt;
  });
});

lightboxClose.addEventListener('click', () => lightbox.classList.remove('active'));
lightbox.addEventListener('click', e => { if(e.target===lightbox) lightbox.classList.remove('active'); });
</script>

</body>
</html>

<script src="js/app.js"></script>