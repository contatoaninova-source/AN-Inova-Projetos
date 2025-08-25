<!-- Certificados -->
<section id="certificados" class="section fade-in">
  <h2 class="section-title">Meus Certificados</h2>

  <div class="swiper certificados-swiper">
    <div class="swiper-wrapper">
      <?php if($certificados->num_rows > 0): ?>
        <?php while($cert = $certificados->fetch_assoc()): ?>
          <div class="swiper-slide project-card" data-id="<?= (int)$cert['id'] ?>">
            <div class="project-image" style="text-align:center; margin-bottom:20px;">
              <?php if(!empty($cert['media'])): ?>
                <img src="admin/<?= htmlspecialchars($cert['media']) ?>" alt="<?= htmlspecialchars($cert['titulo']) ?>" style="max-width:100%; border-radius:10px;">
              <?php else: ?>
                <i class="fas fa-certificate" style="font-size:50px; color:#ff4d4d;"></i>
              <?php endif; ?>
            </div>
            <div class="project-content">
              <h3><?= htmlspecialchars($cert['titulo']) ?></h3>
              <p><?= htmlspecialchars($cert['descricao']) ?></p>
              <a href="modal:certificado:<?= (int)$cert['id'] ?>" class="btn btn-primary">Ver Certificado</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p style="color:#ccc; text-align:center;">Nenhum certificado cadastrado ainda.</p>
      <?php endif; ?>
    </div>

    <!-- Botões de navegação -->
    <div class="swiper-button-prev certificados-prev"></div>
    <div class="swiper-button-next certificados-next"></div>

    <!-- Pagination -->
    <div class="swiper-pagination certificados-pagination"></div>
  </div>
</section>

<!-- Swiper CSS e JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
const swiperCertificados = new Swiper('.certificados-swiper', {
  slidesPerView: 3,
  spaceBetween: 20,
  loop: false,
  navigation: {
    nextEl: '.certificados-next',
    prevEl: '.certificados-prev'
  },
  pagination: {
    el: '.certificados-pagination',
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
