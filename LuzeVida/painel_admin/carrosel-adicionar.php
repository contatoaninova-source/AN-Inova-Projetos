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
    $legenda = $_POST['legenda'];

    $upload_dir = 'carrosel-upload/';
    $arquivo = $_FILES['imagem'];

    // Garante que a pasta existe
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Lista de extensões permitidas
    $extensoes_validas = ['jpg', 'jpeg', 'png', 'gif'];
    $nome_original = pathinfo($arquivo['name'], PATHINFO_FILENAME);
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    $nome_limpo = preg_replace('/[^a-zA-Z0-9_-]/', '', $nome_original);
    $nome_final = uniqid() . '-' . $nome_limpo . '.' . $extensao;
    $destino = $upload_dir . $nome_final;

    // Verifica extensão e move arquivo
    if (!in_array($extensao, $extensoes_validas)) {
        echo "<script>alert('Formato de imagem inválido. Apenas JPG, PNG e GIF.');</script>";
    } elseif (move_uploaded_file($arquivo['tmp_name'], $destino)) {
        // Salva só o nome no banco
        $stmt = $conn->prepare("INSERT INTO carrossel (imagem, legenda) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome_final, $legenda);
        $stmt->execute();
        echo "<script>alert('Imagem adicionada ao carrossel com sucesso!'); window.location='carrosel-lista.php';</script>";
    } else {
        echo "<script>alert('Erro ao fazer upload da imagem.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adicionar Imagem ao Carrossel</title>
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
    input[type="file"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      transition: border 0.3s ease;
    }

    input[type="text"]:focus {
      border-color: #007bff;
      outline: none;
    }

    #preview {
      display: none;
      max-width: 100%;
      border-radius: 8px;
      margin-top: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      height: auto;
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
      input[type="file"] {
        font-size: 13px;
        padding: 8px 7px;
      }
      button, a.voltar {
        font-size: 14px;
        padding: 11px 5px;
      }
      #preview {
        max-width: 95vw;
        border-radius: 5px;
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
      input[type="file"] {
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
    <h1>Adicionar Nova Imagem ao Carrossel</h1>
    <a href="carrosel-lista.php" class="voltar">← Voltar para a lista</a>

    <form method="POST" enctype="multipart/form-data">
      <label>Legenda:
        <input type="text" name="legenda" required>
      </label>

      <label>Imagem:
        <input type="file" name="imagem" accept="image/*" required>
      </label>

      <img id="preview" alt="Prévia da imagem" />

      <button type="submit">Salvar</button>
    </form>
  </div>

  <script>
    document.querySelector('input[name="imagem"]').addEventListener('change', function(event) {
      const file = event.target.files[0];
      const preview = document.getElementById('preview');
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        preview.src = '#';
        preview.style.display = 'none';
      }
    });
  </script>
</body>
</html>