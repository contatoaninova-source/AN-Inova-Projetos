<!DOCTYPE html>

<html lang="pt-BR">

<head>

       <meta charset="UTF-8">

    <title> Unidades - Casa de Repouso Luz e Vida</title>

    <meta name="title" content="Unidades - Casa de Repouso Luz e Vida">

    <meta name="description" content="Residencial para idosos Luz e Vida. Bem-estar, segurança e carinho para nossos residentes. Conheça nossas unidades e serviços.">

    <meta name="keywords" content="casa de repouso, residencial, idosos, luz e vida, conforto, cuidado, enfermagem, segurança, bem-estar, lazer, saúde, alimentação, assistência, terapia ocupacional">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="GlitchX">

    <meta name="publisher" content="Casa de Repouso Luz e Vida">

    <meta name="robots" content="index, follow">

    <link rel="canonical" href="https://www.casaderepousoluzevida.com.br/">



    <!-- CSS principal -->

    <link rel="stylesheet" href="css/unidades.css">

    <!-- Fontes e ícones -->

    <link href="https://fonts.googleapis.com/css2?family=Simonetta&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Grand+Cru+S&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- baguetteBox CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/baguettebox.js@1.11.1/dist/baguetteBox.min.css">

    <!-- Favicon -->

    <link rel="icon" type="image/png" href="imagens/favicom.png" title="imagem da logo" alt="foto da logo">

     <!-- manifest para o pwa (criado no php) -->

    <link rel="manifest" href="manifest.json">

    <meta name="theme-color" content="#125ea0ff">

</head>

<body>

    <h1 style="position:absolute;left:-9999px;">Unidades</h1>


<main>

    <!-- Cabeçalho -->

    <?php include("partials/cabecalho.php"); ?>

    <!-- Fim do Cabeçalho -->

	

	<section class="introducao-container">

        <br><h1 class="introducao-titulo">Conheça nossas Unidades</h1>

    </section>





    <div class="unidades-grid">

            <a class="unidade-link" href="https://maps.google.com/?q=R.+Croata,+30+-+Lapa,+São+Paulo+-+SP" target="_blank">

        <div class="unidade-box">

            <img src="imagens/unidade1.jpg" alt="Unidade 1 - Casa de Repouso Luz&vida">

            <h2>Unidade 1</h2>

            <p>

                <b>Casa de Repouso Luz&vida</b><br>

                Rua Croata, 30<br>

                Lapa - São Paulo/SP - Brasil<br>

                CEP: 05056-020

            </p>

        </div>

</a>







<a class="unidade-link" href="https://maps.app.goo.gl/UAZE2tgHKK6PLx6z9" target="_blank">

        <div class="unidade-box">

            <img src="imagens/unidade2.jpg" alt="Unidade 2 - Lar de idosos Luz & Vida">

            <h2>Unidade 2</h2>

            <p>

                <b>Lar de idosos Luz & Vida</b><br>

                Rua Guararapes, 104<br>

                Lapa - São Paulo/SP - Brasil<br>

                CEP: 05077-050

            </p>

        </div>

</a>







<a class="unidade-link" href="https://maps.app.goo.gl/wdmvGYf3qb3cVegm7" target="_blank">

        <div class="unidade-box">

            <img src="imagens/unidade4.png" alt="Unidade 3 - Felicità Residencial">

            <h2>Unidade 3</h2>

            <p>

                <b>Felicità Residencial</b><br>

                Rua Francisco Mainardi, 20<br>

                Lapa - São Paulo/SP - Brasil<br>

                CEP: 05075-070

            </p>

        </div>

</a>





<a class="unidade-link" href="https://maps.app.goo.gl/dA6LBDXQVSyRLZij8" target="_blank">

        <div class="unidade-box">

            <img src="imagens/unidade3.jpg" alt="Unidade 4 - Casa de Repouso Guiará">

            <h2>Unidade 4</h2>

            <p>

                <b>Casa de Repouso Guiará</b><br>

                Rua Guiará, 395<br>

                Pompeia - São Paulo/SP - Brasil<br>

                CEP: 05025-020

            </p>

        </div>

</a>

    </div>































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



</body>



<!-- PWA -->

<script src="myscripts.js"></script>



</html>