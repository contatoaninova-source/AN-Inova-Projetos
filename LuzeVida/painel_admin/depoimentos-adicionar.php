<?php
session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}
?>

<?php
include('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $link = $_POST['link'];
  $stmt = $conexao->prepare("INSERT INTO depoimentos (titulo, link) VALUES (?, ?)");
  $stmt->bind_param("ss", $titulo, $link);
  $stmt->execute();
  echo "<script>alert('Depoimento adicionado com sucesso!'); window.location='depoimentos-lista.php';</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Depoimento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f2f4f7;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
      padding: 40px 20px;
    }

    .container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      max-width: 500px;
      width: 100%;
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    a.voltar {
      display: inline-block;
      background: #6c757d;
      color: #fff;
      padding: 8px 14px;
      border-radius: 5px;
      margin-bottom: 20px;
      text-decoration: none;
      transition: background 0.3s ease;
      width: 100%;
      text-align: center;
      box-sizing: border-box;
    }

    a.voltar:hover {
      background: #5a6268;
    }

    label {
      display: block;
      margin-bottom: 15px;
      color: #333;
      font-weight: 500;
    }

    input[type="text"],
    input[type="url"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      transition: border 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="url"]:focus {
      border-color: #007bff;
      outline: none;
    }

    button {
      background: #007bff;
      color: #fff;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #0056b3;
    }

    @media (max-width: 600px) {
      body {
        padding: 15px 3px;
      }
      .container {
        padding: 15px 6px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      }
      h1 {
        font-size: 20px;
      }
      label {
        font-size: 13px;
        margin-bottom: 10px;
      }
      input[type="text"],
      input[type="url"] {
        font-size: 13px;
        padding: 8px 7px;
      }
      button, a.voltar {
        font-size: 14px;
        padding: 11px 5px;
      }
    }

    @media (max-width: 400px) {
      .container {
        padding: 8px 2px;
      }
      h1 {
        font-size: 16px;
      }
      label {
        font-size: 12px;
      }
      input[type="text"],
      input[type="url"] {
        font-size: 12px;
      }
      button, a.voltar {
        font-size: 12px;
        padding: 8px 2px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Adicionar Depoimento</h1>
    <a href="depoimentos-lista.php" class="voltar">← Voltar para a lista</a>

    <form method="POST" autocomplete="off">
      <label>Título:
        <input type="text" name="titulo" required>
      </label>

      <label>Link do vídeo (YouTube):
        <input type="url" name="link" required>
      </label>

      <button type="submit">Salvar</button>
    </form>
  </div>
</body>
</html>