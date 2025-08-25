 <footer class="footer">
  <div class="container footer__grid">
    <!-- Contato -->
    <div class="footer__col">
      <h3>Contato</h3>
      <p>Telefone: (11) 99999-9999</p>
      <p>Email: contato@lopescortes.com</p>
      <p>Endereço: Rua Exemplo, 123 - São Paulo</p>
    </div>

    <!-- Links Rápidos -->
    <div class="footer__col">
      <h3>Links Rápidos</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="produto-lista.php">Produtos</a></li>
        <li><a href="agendamentos.php">Agendamentos</a></li>
        <li><a href="localizacao.php">Localização</a></li>
        <li><a href="galeria.php">Galeria</a></li>
      </ul>
    </div>

    <!-- Redes Sociais -->
    <div class="footer__col">
      <h3>Siga-nos</h3>
      <div class="footer__socials">
        <a href="#" aria-label="Instagram">Instagram</a>
        <a href="#" aria-label="Facebook">Facebook</a>
        <a href="#" aria-label="WhatsApp">WhatsApp</a>
      </div>
    </div>
  </div>
  <div class="footer__bottom">
    <p>&copy; 2025 Lopes Cortes. Todos os direitos reservados.</p>
  </div>
</footer>


<!-- Botão flutuante WhatsApp -->
<a href="https://wa.me/5511999999999" target="_blank" class="whatsapp-float" aria-label="Contato via WhatsApp">
  <img src="/Barbearia/whatsapp.ico" alt="WhatsApp">
</a>

<!-- Estilo inline para o botão flutuante -->
<style>
.whatsapp-float {
  position: fixed;
  bottom: 24px;
  right: 24px;
  width: 60px;
  height: 60px;
  background-color: #25D366;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 4px 12px rgba(0,0,0,0.3);
  transition: transform 0.2s, box-shadow 0.2s;
  z-index: 2000;
}

.whatsapp-float img {
  width: 32px;
  height: 32px;
}

.whatsapp-float:hover {
  transform: scale(1.1);
  box-shadow: 0 6px 18px rgba(0,0,0,0.35);
}
</style>

