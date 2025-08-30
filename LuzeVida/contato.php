<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Contato - Casa de Repouso Luz e Vida</title>

    <meta name="title" content="Contato - Casa de Repouso Luz e Vida">

    <meta name="description"
        content="Residencial para idosos Luz e Vida. Bem-estar, segurança e carinho para nossos residentes. Conheça nossas unidades e serviços.">

    <meta name="keywords"
        content="casa de repouso, residencial, idosos, luz e vida, conforto, cuidado, enfermagem, segurança, bem-estar, lazer, saúde, alimentação, assistência, terapia ocupacional">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="GlitchX">

    <meta name="publisher" content="Casa de Repouso Luz e Vida">

    <meta name="robots" content="index, follow">

    <link rel="canonical" href="https://www.casaderepousoluzevida.com.br/">



    <!-- CSS principal -->

    <link rel="stylesheet" href="css/contato.css">

    <!-- Fontes e ícones -->

    <link href="https://fonts.googleapis.com/css2?family=Simonetta&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Grand+Cru+S&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Slick Carousel CSS -->

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- baguetteBox CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/baguettebox.js@1.11.1/dist/baguetteBox.min.css">

    <!-- Favicon -->

    <link rel="icon" type="image/png" href="imagens/favicom.png">

    <!-- manifest para o pwa (criado no php) -->

    <link rel="manifest" href="manifest.json">

    <meta name="theme-color" content="#125ea0ff">

</head>

<body>

    <h1 style="position:absolute;left:-9999px;">Contato</h1>


    <main>

        <!-- Cabeçalho -->

        <?php include("partials/cabecalho.php"); ?>

        <!-- Fim do Cabeçalho -->

        <section class="introducao-container">

            <h1 class="introducao-titulo" style="margin-top: 20px;">Contato</h1>

        </section>
        
        <div class="contato-container">

<div class="contato-whatsapp" style="text-align: center; margin-bottom: 0px;margin-top: 40px;">
                <a href="https://wa.me/5511976883001" target="_blank" class="btn-whatsapp">
                    Entre em contato pelo Whatsapp
                </a>
            </div><br><br>


            <p class="contato-subtitulo" STYLE="font-size: 1.58rem;">

                Tire suas dúvidas preenchendo o formulário abaixo:

            </p>

            <hr class="contato-divisor" />



            <?php

            // Mensagem de sucesso/erro após envio
            
            $mensagemStatus = '';

            $mensagemClasse = '';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                require 'PHPMailerAutoload.php';

                require 'class.phpmailer.php';



                $nome = $_POST['nome'] ?? '';

                $email = $_POST['email'] ?? '';

                $telefone = $_POST['telefone'] ?? '';

                $mensagem = $_POST['mensagem'] ?? '';



                // Validação simples
            
                if ($nome && $email && $telefone && $mensagem) {

                    $mailer = new PHPMailer;

                    $mailer->isSMTP();

                    $mailer->SMTPOptions = array(

                        'ssl' => array(

                            'verify_peer' => false,

                            'verify_peer_name' => false,

                            'allow_self_signed' => true

                        )

                    );

                    $mailer->Host = 'mail.cronos-painel.com';

                    $mailer->SMTPAuth = true;

                    $mailer->Username = 'contato@casaderepousoluzevida.com.br';

                    $mailer->Password = 'CasARepouso2025@';

                    $mailer->Port = 587;

                    $mailer->isHTML(true);

                    $mailer->CharSet = 'UTF-8';



                    $mailer->AddAddress('contato@casaderepousoluzevida.com.br', "destinatario");

                    $mailer->Sender = 'contato@casaderepousoluzevida.com.br';

                    $mailer->FromName = $nome;

                    $mailer->From = $email;

                    $mailer->Subject = "Contato pelo site";



                    // Corpo igual ao modelo funcional
            
                    $corpoMSG = "<strong>Nome:</strong> $nome <br><br> <strong>E-mail:</strong> $email <br><br> <strong>Telefone:</strong> $telefone <br><br> <strong>Mensagem:</strong> $mensagem <br><br>";

                    $mailer->MsgHTML($corpoMSG);



                    if (!$mailer->Send()) {

                        $mensagemStatus = "Erro ao enviar mensagem: " . $mailer->ErrorInfo;

                        $mensagemClasse = "erro";

                    } else {

                        $mensagemStatus = "Mensagem enviada com sucesso!<br>Logo mais entramos em contato com você.";

                        $mensagemClasse = "sucesso";

                    }

                } else {

                    $mensagemStatus = "Preencha todos os campos obrigatórios.";

                    $mensagemClasse = "erro";

                }

            }

            ?>



            <?php if (!empty($mensagemStatus)): ?>

                <div id="mensagem-<?php echo $mensagemClasse; ?>" style="

        background: <?php echo $mensagemClasse == 'sucesso' ? '#d4edda' : '#f8d7da'; ?>;

        color: <?php echo $mensagemClasse == 'sucesso' ? '#155724' : '#721c24'; ?>;

        padding: 15px;

        border-radius: 8px;

        margin-bottom: 20px;

        opacity: 0;

        transform: translateY(-20px);

        transition: opacity 0.5s, transform 0.5s;

        position: relative;

        z-index: 100;

        max-width: 400px;

        margin-left: auto;

        margin-right: auto;">

                    <?php echo $mensagemStatus; ?>

                </div>

                <script>

                    // Anima entrada/saída da mensagem

                    window.onload = function () {

                        var msg = document.getElementById('mensagem-<?php echo $mensagemClasse; ?>');

                        if (msg) {

                            setTimeout(function () {

                                msg.style.opacity = '1';

                                msg.style.transform = 'translateY(0)';

                            }, 50);

                            setTimeout(function () {

                                msg.style.opacity = '0';

                                msg.style.transform = 'translateY(-20px)';

                            }, 4000);

                        }

                    }

                </script>

            <?php endif; ?>



            <form class="contato-formulario" method="post" action="">

                <input type="text" name="nome" id="nome" placeholder="Digite o seu nome:" required />
                <input type="email" name="email" id="email" placeholder="Digite o seu Email:" required />
                <input type="tel" name="telefone" id="telefone" placeholder="Digite o seu telefone:" required />
                <textarea name="mensagem" id="mensagem" placeholder="Escreva sobre o assunto..." required></textarea>
                <button type="submit" class="btn-enviar">Enviar</button>
                
                <!--<div class="contato-privacidade">
                    <p>Ao enviar, você concorda com nossa <a href="politica-de-privacidade.php">Política de Privacidade</a>.</p>
                </div>-->
                    
            </form>

<br>
            <div class="contato" style="font-size: 1.30rem; text-align: center;">
                <p>Telefone: (11) 97688-3001</p>
                <p>Email: <a href="mailto:contato@casaderepousoluzevida.com.br" style="text-decoration: none; color: inherit;">contato@casaderepousoluzevida.com.br</a></p>
            </div>

            

        </div>



        <!-- Rodapé -->

        <?php include("partials/rodape.php"); ?>

        <!-- Fim do Rodapé -->

    </main>



    <!-- jQuery (coloque só uma vez) para funcionar o menu -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- Script do menu hambúrguer -->

    <script>

        $(document).on("click", ".menu-toggle", function () {

            $(".navegacao-lista").toggleClass("ativa"); // Alterna visibilidade do menu

        });

    </script>



    <!-- PWA -->

    <script src="myscripts.js"></script>

</body>

</html>