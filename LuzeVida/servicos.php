<?php
// Conexão com o banco de dados
$host = "casaderepouso.vpscronos0691.mysql.dbaas.com.br";
$usuario = "casaderepouso";
$senha = "Casaderepouso2025@"; 
$banco = "casaderepouso";

// Conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if ($conexao->connect_errno) {
    die("<div style='color:red; text-align:center; margin-top:40px;'>Falha ao conectar ao banco de dados: " . $conexao->connect_error . "</div>");
}

// Função para buscar depoimentos no banco
function buscarDepoimentos($conexao) {
    $sql = "SELECT * FROM depoimentos ORDER BY criado_em DESC"; // Pega todos, mais recentes primeiro
    $result = $conexao->query($sql);
    return $result;
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
    <title>Luz e Vida - Residencial para Idosos</title>
    <meta name="title" content="Luz e Vida - Residencial para Idosos">
    <meta name="description" content="Residencial para idosos Luz e Vida. Bem-estar, segurança e carinho para nossos residentes. Conheça nossas unidades e serviços.">
    <meta name="keywords" content="casa de repouso, residencial, idosos, luz e vida, conforto, cuidado, enfermagem, segurança, bem-estar, lazer, saúde, alimentação, assistência, terapia ocupacional">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="GlitchX">
    <meta name="publisher" content="Casa de Repouso Luz e Vida">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.casaderepousoluzevida.com.br/">

    <!-- CSS principal -->
    <link rel="stylesheet" href="css/servicos.css">
    <!-- Fontes e ícones -->
    <link href="https://fonts.googleapis.com/css2?family=Simonetta&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Grand+Cru+S&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <!-- baguetteBox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/baguettebox.js@1.11.1/dist/baguetteBox.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="imagens/favicom.png">
     <!-- manifest para o pwa (criado no php) -->
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#125ea0ff">
</head>
<body>
<main>
    <!-- Cabeçalho -->
    <?php include("partials/cabecalho.php"); ?>
    <!-- Fim do Cabeçalho -->
	
	<section class="introducao-container">
        <h1 class="introducao-titulo">Serviços</h1>
    </section>

	
	
    <!-- Linha -->
    <hr style="width: 60%; margin: 32px auto; border: none; border-top: 2px solid rgba(0, 0, 0, 0.2);">
    <!-- Final da Linha -->

    <!-- Primeiro bloco: texto depois imagem -->
<section class="bloco-img-texto galeria-lightbox">
    <div class="coluna-texto">
        <p>
            A Casa de Repouso Luz & Vida trabalha de modo a oferecer uma cobertura completa em todas as necessidades de nossos pacientes. Em cada um de nossos serviços temos em comum a intenção de que nossos pacientes sintam-se em casa, acolhidos e recebendo a atenção necessária para seu bem-estar.
        </p>
    </div>
    <div class="coluna-imagem">
        <a href="imagens/Mídia (1).jpg">
            <img src="imagens/Mídia (1).jpg" alt="Descrição da imagem" style="max-width:380px; width:100%; border-radius:12px; box-shadow:0 2px 10px rgba(50,90,150,0.1); cursor: zoom-in;">
        </a>
    </div>
</section>



<!-- Segundo bloco: primeiro imagem, depois texto -->
<section class="bloco-img-texto galeria-lightbox">
    <div class="coluna-imagem">
        <a href="imagens/atividade1.jpg">
            <img src="imagens/atividade1.jpg" alt="Descrição da imagem" style="max-width:380px; width:100%; border-radius:12px; box-shadow:0 2px 10px rgba(50,90,150,0.1); cursor: zoom-in;">
        </a>
    </div>
    <div class="coluna-texto">
        <p>
            Oferecemos a possibilidade de residência permanente ou temporária. Nos casos de internação temporária em função de recuperação pós-cirúrgica, contamos com uma estrutura completa para facilitar sua recuperação.
        </p>
    </div>
</section>


    <!--Frase de complemento -->
    <section class="fraseComplemento">
        <p>
           Nossos médicos e toda a equipe de enfermagem possuem larga experiência nesse tipo de procedimento. <br>
           Além disso, as instalações foram especialmente desenhadas para essa finalidade.
        </p>
    </section>

    <br><br>

    <!-- Frase de encerramento -->
    <section class="fraseEncerramento">
        <h1>
            Profissionais Preparados para suas Necessidades
        </h1>

        <p>
            Em todos os casos, a Casa de Repouso Luz & Vida possui um espaço preparado para que o distanciamento do
paciente da sua residência gere o menor impacto possível. 
        </p>

        <br><br>

        <p>
        <strong>    Faça-nos uma visita e conheça mais sobre <a href="quemsomos.php">nós</a></strong>
        </p>
    </section>


    <?php
// Função para converter link normal em embed
function converterParaEmbed($url) {
    if (strpos($url, 'watch?v=') !== false) {
        $video_id = explode('watch?v=', $url)[1];
        $video_id = strtok($video_id, '&');
        return 'https://www.youtube.com/embed/' . $video_id;
    } else {
        return $url;
    }
}
?>

<!-- Seção de Depoimentos dinâmica -->
<section class="depoimentos-section">
  <h2 class="depoimentos-titulo">Depoimentos</h2>
  <div class="depoimentos-carousel">
    <?php
    $depoimentos = buscarDepoimentos($conexao);
    if ($depoimentos && $depoimentos->num_rows > 0):
      while ($dep = $depoimentos->fetch_assoc()):
        $link_embed = converterParaEmbed($dep['link']); // Usa conversão aqui
    ?>
      <div class="depoimento-video">
        <iframe width="100%" height="215"
          src="<?= htmlspecialchars($link_embed) ?>"
          title="<?= htmlspecialchars($dep['titulo']) ?>"
          frameborder="0" allowfullscreen></iframe>
      </div>
    <?php
      endwhile;
    else:
      echo "<p>Não há depoimentos no momento.</p>";
    endif;
    ?>
  </div>
</section>


    </div>
  </section>






    <!-- Rodapé -->
    <?php include("partials/rodape.php"); ?>
</main>

<!-- Scripts necessários -->
<script src="https://cdn.jsdelivr.net/npm/baguettebox.js@1.11.1/dist/baguetteBox.min.js"></script>
<script>
  // Garante que o baguetteBox será inicializado após o carregamento do DOM
  document.addEventListener("DOMContentLoaded", function() {
    baguetteBox.run('.galeria-lightbox');
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>// Adicione ao final do seu HTML, depois de carregar o slick.min.js

$('.depoimentos-carousel').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  infinite: true,
  responsive: [
    {
      breakpoint: 900,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});</script>


<!-- Script para controlar o menu no modo mobile -->
<script>
    $(document).on("click", ".menu-toggle", function(){
        $(".navegacao-lista").toggleClass("ativa"); // Alterna visibilidade do menu
    });
</script>
  <!-- PWA -->
<script src="myscripts.js"></script>

</body>


</html>

