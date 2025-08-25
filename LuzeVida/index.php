<?php 

// Inclua a conexão apenas se for usar banco em outras partes

// require_once("conexao.php"); 

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

    <link rel="stylesheet" href="css/index.css">

    <!-- Fontes e ícones -->

    <link href="https://fonts.googleapis.com/css2?family=Simonetta&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Grand+Cru+S&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Slick Carousel CSS (apenas uma vez) -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

    <!-- Favicon -->

    <link rel="icon" type="image/x-icon" href="favicon.ico" title="imagem da logo" alt="foto da logo">

    <!-- manifest para o pwa (criado no php) -->

    <link rel="manifest" href="manifest.json">

    <meta name="theme-color" content="#125ea0ff">

    <link rel="apple-touch-icon" href="logo192.png">





</head>

<body>

<main>

    <!-- Cabeçalho -->

    <?php include("partials/cabecalho.php"); ?>



    <section class="introducao-container">

        <h1 class="introducao-titulo">Bem-vindo à Luz e Vida</h1>

    </section>



    <!-- Carrossel/Banner (NÃO use <div class="carrossel"> aqui, só no include!) -->

    <?php include("partials/carrossel.php"); ?>

    

    <!-- Seção de Introdução -->

    <?php include("partials/sobre.php"); ?>



    <!-- Unidades (HTML fixo) -->

    <?php include("partials/unidades.php"); ?>

    

    <!-- Rodapé -->

    <?php include("partials/rodape.php"); ?>

</main>



<!-- SCRIPTS: Ordem correta e sem duplicatas! -->



<!-- jQuery (só uma vez, ANTES do Slick) -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick Carousel JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>



<!-- Inicialização do Slick e do menu -->

<script>

$(document).ready(function(){

    $('.carrossel').slick({

        dots: false,

        infinite: true,

        speed: 500,

        slidesToShow: 1,

        slidesToScroll: 1,

        autoplay: true,

        autoplaySpeed: 1000,

        arrows: true,

        prevArrow: '<button type="button" class="slick-prev">←</button>',

        nextArrow: '<button type="button" class="slick-next">→</button>'

    });



    // Use delegação de evento para garantir que o menu funcione sempre

    $(document).on("click", ".menu-toggle", function(){

        $(".navegacao-lista").toggleClass("ativa");

    });

});

</script>

   

<!-- PWA -->

<script src="myscripts.js"></script>



</body>

</html>