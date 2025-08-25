<?php
session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}
?>

<?php
include('../conexao.php');

// Pega o ID pela URL
$id = (int) $_GET['id'];

// Pega o registro atual do banco
$registro = $conexao->query("SELECT * FROM carrossel WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $legenda = $_POST['legenda'];

    // Verifica se foi enviada nova imagem
    if (!empty($_FILES['imagem']['name'])) {
        $upload_dir = 'carrosel-upload/';

        // Garante que a pasta existe
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $extensoes_validas = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $extensoes_validas)) {
            echo "<script>alert('Formato inválido. JPG, PNG ou GIF.');</script>";
            exit;
        }

        // Cria nome único
        $nome_final = uniqid() . '-' . basename($_FILES['imagem']['name']);
        $destino = $upload_dir . $nome_final;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
            // Atualiza imagem e legenda — salva só o NOME!
            $sql = "UPDATE carrossel SET imagem = ?, legenda = ? WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssi", $nome_final, $legenda, $id);
            $stmt->execute();
        } else {
            echo "<script>alert('Erro ao fazer upload da imagem.');</script>";
        }
    } else {
        // Atualiza só a legenda
        $sql = "UPDATE carrossel SET legenda = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("si", $legenda, $id);
        $stmt->execute();
    }

    header('Location: carrosel-lista.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Imagem do Carrossel</title>
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
      margin-bottom: 25px;
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

    img {
      display: block;
      max-width: 100%;
      border-radius: 8px;
      margin: 0 auto 20px auto;
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

    a.voltar {
      display: inline-block;
      background: #6c757d;
      color: #fff;
      padding: 8px 14px;
      border-radius: 5px;
      margin-top: 20px;
      text-decoration: none;
      transition: background 0.3s ease;
      width: 100%;
      text-align: center;
      box-sizing: border-box;
    }

    a.voltar:hover {
      background: #5a6268;
    }

    @media (max-width: 600px) {
      body {
        padding: 10px;
      }
      .container {
        padding: 14px 7px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      }
      h1 {
        font-size: 21px;
        margin-bottom: 16px;
      }
      input[type="text"],
      input[type="file"] {
        font-size: 13px;
        padding: 8px 7px;
      }
      label {
        font-size: 15px;
        margin-bottom: 10px;
      }
      button, a.voltar {
        font-size: 14px;
        padding: 11px 5px;
      }
      img {
        max-width: 95vw;
        border-radius: 5px;
      }
    }

    @media (max-width: 400px) {
      .container {
        padding: 8px 2px;
      }
      h1 {
        font-size: 17px;
      }
      label {
        font-size: 13px;
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
    <h1>Editar Imagem do Carrossel</h1>
    <form method="POST" enctype="multipart/form-data">
      <label>Imagem Atual:</label>
      <img src="carrosel-upload/<?= htmlspecialchars($registro['imagem']); ?>" alt="Imagem Atual">

      <label>Nova Imagem:
        <input type="file" name="imagem" accept="image/*">
      </label>

      <label>Legenda:
        <input type="text" name="legenda" value="<?= htmlspecialchars($registro['legenda']); ?>" required>
      </label>

      <button type="submit">Atualizar</button>
    </form>

    <a href="carrosel-lista.php" class="voltar">← Voltar para a lista</a>
  </div>
</body>
</html>