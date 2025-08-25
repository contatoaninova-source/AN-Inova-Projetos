<!-- painel-admin/index.php -->
<?php
// Aqui você pode futuramente incluir a verificação de login, se quiser
session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel do Administrador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .painel {
      background: #ffffff;
      padding: 40px 30px;
      max-width: 450px;
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      text-align: center;
    }

    .painel h2 {
      margin-bottom: 30px;
      color: #333333;
      font-size: 26px;
      letter-spacing: 1px;
    }

    .link {
      display: block;
      background: #007bff;
      color: #ffffff;
      text-decoration: none;
      padding: 14px 0;
      margin: 10px 0;
      border-radius: 6px;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .link:hover {
      background: #0056b3;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .link:last-child {
      background: #dc3545;
    }

    .link:last-child:hover {
      background: #b02a37;
    }

    .painel a.voltar {
      display: inline-block;
      margin-top: 20px;
      color: #333333;
      text-decoration: underline;
      font-size: 14px;
    }

    @media(max-width: 500px) {
      .painel {
        padding: 30px 20px;
      }

      .painel h2 {
        font-size: 22px;
      }

      .link {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <div class="painel">
    <h2>Área Administrativa</h2>
    <a class="link" href="galeria-lista.php">Gerenciar Galeria</a>
    <a class="link" href="carrosel-lista.php">Gerenciar Carrossel</a> 
    <a class="link" href="depoimentos-lista.php">Gerenciar Depoimentos</a>
    <br>
    <a class="link" style="background-color: #ff0000;" href="logout.php">Sair</a>
    <a class="voltar" href="../index.php">← Voltar para o site</a>
  </div>
</body>
</html>


