<!DOCTYPE html>

<html lang="pt">

<head>

     <meta charset="UTF-8">

    <title>Quem Somos - Casa de Repouso Luz e Vida</title>

    <meta name="title" content="Quem Somos - Casa de Repouso Luz e Vida">

    <meta name="description" content="Residencial para idosos Luz e Vida. Bem-estar, segurança e carinho para nossos residentes. Conheça nossas unidades e serviços.">

    <meta name="keywords" content="casa de repouso, residencial, idosos, luz e vida, conforto, cuidado, enfermagem, segurança, bem-estar, lazer, saúde, alimentação, assistência, terapia ocupacional">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="GlitchX">

    <meta name="publisher" content="Casa de Repouso Luz e Vida">

    <meta name="robots" content="index, follow">

    <link rel="canonical" href="https://www.casaderepousoluzevida.com.br/">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&family=Simonetta:ital,wght@0,400;0,900;1,400;1,900&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">



    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    

    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">



	

	<!--Aplicar css -->

    <link rel="stylesheet" href="css/quemsomos.css">



    <!-- Font Awesome CDN -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

	

    <!-- Favicon -->

	<link rel="icon" type="image/png" href="imagens/favicom.png" title="imagem da logo" alt="foto da logo">

     <!-- manifest para o pwa (criado no php) -->

    <link rel="manifest" href="manifest.json">

    <meta name="theme-color" content="#125ea0ff">

		   

</head>



<body>

    <h1 style="position:absolute;left:-9999px;">Quem Somos</h1>

<main> 

<!-- Cabeçalho -->

    <?php include("partials/cabecalho.php"); ?>


<!--conteudo pagina -->

<?php include("partials/conteudo_quemsomos.php"); ?>


<!--rodapé-->

       <?php include("partials/rodape.php"); ?>

</main>

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



</body>

</html>

