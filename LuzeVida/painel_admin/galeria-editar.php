<?php

session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}
?>

<?php
$conn = new mysqli('casaderepouso.vpscronos0691.mysql.dbaas.com.br', 'casaderepouso', 'Casaderepouso2025@', 'casaderepouso');
if ($conn->connect_error) {
    die('Erro: ' . $conn->connect_error);
}

$id = $_GET['id'] ?? 0;
$upload_dir = 'galeria-upload/';

$categorias = $conn->query("SELECT * FROM categoria");

// Seleciona os dados da imagem com bind_result (sem usar get_result)
$stmt = $conn->prepare("SELECT id, titulo, legenda, categoria_id, caminho FROM galeria WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($id_result, $titulo_result, $legenda_result, $categoria_id_result, $caminho_result);
$stmt->fetch();
$stmt->close();

// Verifica se encontrou o item
if (!$titulo_result) {
    die("Imagem não encontrada.");
}

// Monta array com os dados
$item = [
    'id' => $id_result,
    'titulo' => $titulo_result,
    'legenda' => $legenda_result,
    'categoria_id' => $categoria_id_result,
    'caminho' => $caminho_result
];

// Se formulário enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $legenda = $_POST['legenda'];
    $categoria_id = $_POST['categoria_id'];

    $novo_nome = $item['caminho'];

    if (!empty($_FILES['imagem']['name'])) {
        // Remove imagem antiga
        @unlink($upload_dir . $item['caminho']);

        // Salva nova imagem
        $novo_nome = uniqid() . '-' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $upload_dir . $novo_nome);
    }

    // Atualiza no banco de dados
    $stmt = $conn->prepare("UPDATE galeria SET titulo=?, legenda=?, categoria_id=?, caminho=? WHERE id=?");
    $stmt->bind_param("ssisi", $titulo, $legenda, $categoria_id, $novo_nome, $id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Atualizado com sucesso!'); window.location='galeria-lista.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Editar Imagem</title>
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
    select,
    input[type="file"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      transition: border 0.3s ease;
    }

    input[type="text"]:focus,
    select:focus {
      border-color: #007bff;
      outline: none;
    }

    img {
      max-width: 100%;
      border-radius: 8px;
      margin-top: 5px;
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

    /* Responsive adjustments */
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
      select,
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
      select,
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
    <h1>Editar Imagem</h1>
    <form method="POST" enctype="multipart/form-data">
      <label>Título:
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($item['titulo']); ?>" required>
      </label>

      <label>Legenda:
        <input type="text" name="legenda" value="<?php echo htmlspecialchars($item['legenda']); ?>">
      </label>

      <label>Categoria:
        <select name="categoria_id">
          <?php while ($cat = $categorias->fetch_assoc()): ?>
            <option value="<?php echo $cat['id']; ?>" <?php if ($cat['id'] == $item['categoria_id']) echo 'selected'; ?>>
              <?php echo htmlspecialchars($cat['nome']); ?>
            </option>
          <?php endwhile; ?>
        </select>
      </label>

      <label>Imagem Atual:
        <img src="galeria-upload/<?php echo htmlspecialchars($item['caminho']); ?>" alt="Imagem Atual">
      </label>

      <label>Nova Imagem:
        <input type="file" name="imagem" accept="image/*">
      </label>

      <button type="submit">Salvar Alterações</button>

      <a href="galeria-lista.php" class="voltar">← Voltar para a lista</a>
    </form>
  </div>
</body>
</html>