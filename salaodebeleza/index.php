<?php
// include 'includes/header.php';
// include 'includes/menu.php';
// include 'includes/hero.php';
// include 'includes/sobre.php';
// include 'includes/contato.php';
// include 'includes/footer.php';
// include 'includes/modal.php';
// include 'includes/scripts.php';

// Cookie para o modal de aviso
$mostrar_aviso = true;
if(isset($_COOKIE['aviso_visto'])){
    $mostrar_aviso = false;
}
?>

<?php
// Incluindo apenas o header
include 'includes/header.php';
?>

<?php if($mostrar_aviso){ ?>
<!-- Modal de Aviso -->
<div id="avisoModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
  <div class="bg-white rounded-xl p-8 max-w-md text-center shadow-lg relative">
    <h2 class="text-2xl font-bold text-orange-500 mb-4">⚠️ Aviso Importante</h2>
    <p class="text-gray-700 mb-4">
      Este site é uma <strong>demonstração de projetos e portfólio</strong> e pode ser utilizado em fins lucrativos como exemplo de trabalho. 
      Todo conteúdo é original e desenvolvido por mim, <strong>direitos reservados ao autor</strong>.
    </p>
    <p class="text-gray-600 mb-6">
      Ao clicar em "Entrar no site", você confirma estar ciente deste aviso.
    </p>
    <button id="entrarBtn" class="bg-pet-orange text-white px-6 py-3 rounded-full font-semibold hover:bg-orange-600 transition-colors">
      Entrar no site
    </button>
  </div>
</div>

<script>
const modal = document.getElementById('avisoModal');
const btn = document.getElementById('entrarBtn');

btn.addEventListener('click', () => {
    modal.style.display = 'none';
    document.cookie = "aviso_visto=true; max-age=" + 7*24*60*60 + "; path=/";
});

window.addEventListener('click', (e) => {
    if(e.target === modal){
        modal.style.display = 'none';
        document.cookie = "aviso_visto=true; max-age=" + 7*24*60*60 + "; path=/";
    }
});
</script>
<?php } ?>

<?php
// Incluindo o restante do site
include 'includes/menu.php';
include 'includes/hero.php';
include 'includes/sobre.php';
include 'includes/contato.php';
include 'includes/footer.php';
include 'includes/modal.php';
include 'includes/scripts.php';
?>
