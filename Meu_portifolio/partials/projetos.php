<!-- Projetos -->
<section id="projetos" class="section fade-in">
  <h2 class="section-title">Meus Projetos</h2>

  <div class="swiper projetos-swiper">
    <div class="swiper-wrapper">
      <?php if($projetos->num_rows > 0): ?>
        <?php while($proj = $projetos->fetch_assoc()): ?>
          <div class="swiper-slide project-card" data-id="<?= (int)$proj['id'] ?>">
            <div class="project-image" style="text-align:center; margin-bottom:20px;">
              <?php if(!empty($proj['imagem'])): ?>
                <img src="admin/<?= htmlspecialchars($proj['imagem']) ?>" alt="<?= htmlspecialchars($proj['titulo']) ?>" style="max-width:100%; border-radius:10px;">
              <?php else: ?>
                <i class="fas fa-briefcase" style="font-size:50px; color:#ff4d4d;"></i>
              <?php endif; ?>
            </div>
            <div class="project-content">
              <h3><?= htmlspecialchars($proj['titulo']) ?></h3>
              <p><?= htmlspecialchars($proj['descricao']) ?></p>
              <a href="modal:projeto:<?= (int)$proj['id'] ?>" class="btn btn-primary">Ver Projeto</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p style="color:#ccc; text-align:center;">Nenhum projeto cadastrado ainda.</p>
      <?php endif; ?>
    </div>

    <!-- Botões de navegação -->
    <div class="swiper-button-prev projetos-prev"></div>
    <div class="swiper-button-next projetos-next"></div>

    <!-- Pagination -->
    <div class="swiper-pagination projetos-pagination"></div>
  </div>
</section>

<!-- Swiper CSS e JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
const swiperProjetos = new Swiper('.projetos-swiper', {
  slidesPerView: 3,
  spaceBetween: 20,
  loop: false, // desativa loop para não ter teletransporte
  autoplay: false, // opcional
  navigation: {
    nextEl: '.projetos-next',
    prevEl: '.projetos-prev'
  },
  pagination: {
    el: '.projetos-pagination',
    clickable: true
  },
  breakpoints: {
    0: { slidesPerView: 1 },
    768: { slidesPerView: 1 },
    1024: { slidesPerView: 2 },
    1200: { slidesPerView: 3 }
  }
});
</script>

<style>
.project-card {
  background: #1b1b1b;
  color: #fff;
  border-radius: 15px;
  padding: 20px;
  transition: transform 0.3s, box-shadow 0.3s;
}
.project-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(255,77,77,0.5);
}
.btn-primary {
  display: inline-block;
  margin-top: 15px;
  padding: 8px 15px;
  background: #ff4d4d;
  color: #fff;
  border-radius: 20px;
  text-decoration: none;
  transition: background 0.3s;
}
.btn-primary:hover {
  background: #ff6666;
}

.project-content p {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

</style>
