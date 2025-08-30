<!-- partials/cabecalho.php -->



<!-- Container principal que envolve toda a estrutura do cabeçalho -->

<div class="principal-container">

    <!-- Logo do site -->

    <div class="logo-container">

        <a href="index.php" aria-label="Página Inicial" title="Ir para a página inicial">

            <img src="imagens/logo1.png" alt="Logo Luz e Vida" title="Logo Luz e Vida">

        </a>

    </div>



    <!-- Navegação principal -->
    <nav class="navegacao-container">

        <!-- Ícone de menu hambúrguer para dispositivos móveis -->

        <div class="menu-toggle" aria-label="Abrir menu de navegação" title="Abrir menu de navegação">☰Início</div>

        
    <h2 style="position:absolute;left:-9999px;">Menu de Navegação</h2>

        <!-- Lista de links do menu -->

        <ul class="navegacao-lista">

            <li class="navegacao-item"><a href="index.php" class="navegacao-link" title="Ir para Início">Início</a></li>

            <li class="navegacao-item"><a href="quemsomos.php" class="navegacao-link" title="Ir para Quem somos">Quem somos</a></li>

            <li class="navegacao-item"><a href="servicos.php" class="navegacao-link" title="Ir para Serviços">Serviços</a></li>

            <li class="navegacao-item"><a href="galeria.php" class="navegacao-link" title="Ir para Galeria">Galeria</a></li>

            <li class="navegacao-item"><a href="unidades.php" class="navegacao-link" title="Ir para Unidades">Unidades</a></li>

            <li class="navegacao-item"><a href="contato.php" class="navegacao-link" title="Ir para Contato">Contato</a></li>

        </ul>

    </nav>
</div>



<!-- Script para controlar o menu no modo mobile -->

<script>

    $(document).on("click", ".menu-toggle", function(){

        $(".navegacao-lista").toggleClass("ativa"); // Alterna visibilidade do menu

    });

</script>

