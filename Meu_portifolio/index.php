<?php
// Inclui conexão com o banco de dados
include 'conexao.php';

// Busca projetos e certificados
$projetos = $conexao->query("SELECT * FROM projetos ORDER BY id DESC");
$certificados = $conexao->query("SELECT * FROM certificados ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- SEO básico -->
<title>Antony Nelson da Silva | Desenvolvedor Full Stack | Portfólio Web</title>
<meta name="description" content="Portfólio de Antony Nelson da Silva, Desenvolvedor Full Stack. Confira meus projetos, certificados e entre em contato para desenvolvimento web profissional.">
<meta name="keywords" content="Desenvolvedor Web, Full Stack, Portfólio, Projetos, Certificados, HTML, CSS, JavaScript, PHP">
<meta name="author" content="Antony Nelson da Silva">

<!-- Open Graph (Facebook, LinkedIn, etc) -->
<meta property="og:title" content="Antony Nelson da Silva | Desenvolvedor Full Stack">
<meta property="og:description" content="Portfólio de Antony Nelson da Silva, confira meus projetos e certificações.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://aninovasites.xo.je/">
<meta property="og:image" content="https://aninovasites.xo.je/logo.png">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Antony Nelson da Silva | Desenvolvedor Full Stack">
<meta name="twitter:description" content="Portfólio de Antony Nelson da Silva, confira meus projetos e certificações.">
<meta name="twitter:image" content="https://aninovasites.xo.je/logo.png">

<!-- Favicon -->
<link rel="icon" href="logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- FontAwesome Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Tiny-slider CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">

    <!-- CSS externo -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'partials/navbar.php'; ?>

    <!-- Hero -->
    <?php include 'partials/hero.php'; ?>

    <!-- Sobre Mim -->
    <?php include 'partials/sobre.php'; ?>

    <!-- Projetos -->
    <?php include 'partials/projetos.php'; ?>

    <!-- Certificados -->
    <?php include 'partials/certificados.php'; ?>

    <!-- Contato -->
    <?php include 'partials/contato.php'; ?>

    <!-- Rodapé -->
    <?php include 'partials/rodape.php'; ?>

    <!-- Modais -->
    <?php include 'partials/modais.php'; ?>

    <!-- Dados do PHP para JavaScript -->
    <script>
        // Dados de projetos vindos do PHP
        const projectsData = <?php
            $arr=[];
            $allProjects=$conexao->query("SELECT * FROM projetos");
            while($p=$allProjects->fetch_assoc()){
                $videoEmbed = null;
                if (!empty($p['video'])){
                    if (strpos($p['video'], "youtube.com/watch?v=") !== false){
                        $videoId = explode("v=", $p['video'])[1];
                        $videoEmbed = "https://www.youtube.com/embed/".$videoId;
                    } else {
                        $videoEmbed = $p['video'];
                    }
                }
                $arr[$p['titulo']]=[
                    'description'=>$p['descricao'],
                    'technologies'=>array_filter(array_map('trim', explode(',', $p['tecnologias']))),
                    'features'=>array_filter(array_map('trim', explode(',', $p['funcionalidades']))),
                    'videoEmbed'=>$videoEmbed,
                    'liveUrl'=>$p['link_projeto'],
                    'githubUrl'=>$p['link_github']
                ];
            }
            echo json_encode($arr);
        ?>;
        // Dados de certificados vindos do PHP
        const certificatesData = <?php
            $arr=[];
            $allCerts=$conexao->query("SELECT * FROM certificados");
            while($c=$allCerts->fetch_assoc()){
                $arr[$c['titulo']]=[
                    'description'=>$c['descricao'],
                    'details'=>array_filter(array_map('trim', explode(',', $c['detalhes']))),
                    'media'=>$c['media'],
                    'link'=>$c['link']
                ];
            }
            echo json_encode($arr);
        ?>;
    </script>

<!-- Tiny-slider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>

    <!-- JS externo -->
    <script src="main.js"></script>
</body>
</html>