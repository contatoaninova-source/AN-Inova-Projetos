<?php



// Conexão com o banco de dados

$servidor = "casaderepouso.vpscronos0691.mysql.dbaas.com.br";

$usuario  = "casaderepouso";

$senha    = "Casaderepouso2025@";

$banco    = "casaderepouso";



$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_errno) {

    die("<div style='color:red; text-align:center; margin-top:40px;'>Falha ao conectar ao banco de dados: " . $conexao->connect_error . "</div>");

}



// Nova função para buscar imagens compatível com PHP 7.1 (sem get_result)

function buscarImagens($conexao, $categoria_id, $limite = 8) {

    $stmt = $conexao->prepare("SELECT id, titulo, caminho FROM galeria WHERE categoria_id = ? ORDER BY id DESC LIMIT ?");

    $stmt->bind_param("ii", $categoria_id, $limite);

    $stmt->execute();

    $stmt->store_result();

    $stmt->bind_result($id, $titulo, $caminho);



    $imagens = [];

    while ($stmt->fetch()) {

        $imagens[] = [

            'id'     => $id,

            'titulo' => $titulo,

            'caminho' => $caminho

        ];

    }

    $stmt->close();

    return $imagens;

}



$categorias = [

    1 => 'Área Externa',

    2 => 'Área Interna',

    3 => 'Quartos e Toaletes',

    4 => 'Atividades'

];



$diretorio = "painel_admin/galeria-upload/";

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



    <link rel="stylesheet" href="css/galeria.css">

    <link href="https://fonts.googleapis.com/css2?family=Simonetta&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Grand+Cru+S&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css"/>

    <link rel="icon" type="image/png" href="imagens/favicom.png" title="imagem da logo" alt="foto da logo">

    <link rel="manifest" href="manifest.json">

    <meta name="theme-color" content="#125ea0ff">

</head>

<body>

<?php include("partials/cabecalho.php"); ?>



<main>

    <section class="introducao-container">

        <h1 class="introducao-titulo">Nossa Galeria</h1>

    </section>



    <?php foreach ($categorias as $cat_key => $cat_nome): ?>

        <section class="secao-galeria mb-5">

            <h2 class="subtitulo-galeria mb-3"><?= htmlspecialchars($cat_nome) ?></h2>

            <div class="gallery">

                <div class="swiper-externo-nav">

                    <div class="swiper-button-prev swiper-btn-prev-<?= $cat_key ?>"></div>

                    <div class="swiper mySwiper-<?= $cat_key ?>">

                        <div class="swiper-wrapper">

                            <?php

                            $imagens = buscarImagens($conexao, $cat_key, 8);

                            if (!empty($imagens)):

                                foreach ($imagens as $img):

                                    $caminhoCompleto = $diretorio . $img['caminho'];

                            ?>

                            <div class="swiper-slide">

                                <a href="<?= htmlspecialchars($caminhoCompleto) ?>" data-caption="<?= htmlspecialchars($img['titulo']) ?>">

                                    <img

                                        src="<?= htmlspecialchars($caminhoCompleto) ?>"

                                        alt="<?= htmlspecialchars($img['titulo']) ?>"

                                        class="img-thumbnail galeria-thumb"

                                        style="cursor:pointer"

                                    >

                                </a>

                                <div class="galeria-legenda"><?= htmlspecialchars($img['titulo']) ?></div>

                            </div>

                            <?php endforeach; else: ?>

                                <div style='padding:20px;'>Nenhuma imagem nesta categoria.</div>

                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="swiper-button-next swiper-btn-next-<?= $cat_key ?>"></div>

                </div>

            </div>

        </section>

    <?php endforeach; ?>

</main>



<?php include("partials/rodape.php"); ?>



<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>

<?php foreach ($categorias as $cat_key => $cat_nome): ?>

new Swiper('.mySwiper-<?= $cat_key ?>', {

    slidesPerView: 2,

    spaceBetween: 24,

    loop: true,

    navigation: {

        nextEl: '.swiper-btn-next-<?= $cat_key ?>',

        prevEl: '.swiper-btn-prev-<?= $cat_key ?>',

    },

    breakpoints: {

        0:   { slidesPerView: 1 },

        700: { slidesPerView: 2 }

    }

});

<?php endforeach; ?>

</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>

<script>

    baguetteBox.run('.gallery');

</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).on("click", ".menu-toggle", function(){

        $(".navegacao-lista").toggleClass("ativa");

    });

</script>



<script src="myscripts.js"></script>

</body>

</html>



<?php $conexao->close(); ?>

