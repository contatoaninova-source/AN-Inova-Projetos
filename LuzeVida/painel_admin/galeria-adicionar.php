<?php
session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}
?>

<?php
$conn = new mysqli('casaderepouso.vpscronos0691.mysql.dbaas.com.br', 'casaderepouso', 'Casaderepouso2025@', 'casaderepouso');
if ($conn->connect_error) { die('Erro: ' . $conn->connect_error); }

$categorias = $conn->query("SELECT * FROM categoria");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $legenda = $_POST['legenda'];
    $categoria_id = $_POST['categoria_id'];

    $upload_dir = 'galeria-upload/';
    $arquivo = $_FILES['imagem'];

    // Garante que a pasta existe
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Valida extensão
    $extensoes_validas = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    $nome_final = uniqid() . '-' . basename($arquivo['name']);
    $destino = $upload_dir . $nome_final;

    if (!in_array($ext, $extensoes_validas)) {
        echo "<script>alert('Formato de imagem inválido. Apenas JPG, PNG e GIF.');</script>";
    } elseif (move_uploaded_file($arquivo['tmp_name'], $destino)) {
        $stmt = $conn->prepare("INSERT INTO galeria (titulo, caminho, legenda, categoria_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $titulo, $nome_final, $legenda, $categoria_id);
        $stmt->execute();
        echo "<script>alert('Imagem adicionada com sucesso!'); window.location='galeria-lista.php';</script>";
    } else {
        echo "<script>alert('Erro ao fazer upload da imagem.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Nova Imagem</title>
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
      padding: 30px 25px;
      border-radius: 10px;
      max-width: 500px;
      width: 100%;
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
      font-size: 24px;
    }

    label {
      display: block;
      margin-bottom: 15px;
      color: #333;
      font-weight: 500;
      font-size: 14px;
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

    img#preview {
      display: none;
      max-width: 100%;
      height: auto;
      margin-top: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
      text-align: center;
      width: 100%;
      box-sizing: border-box;
    }

    a.voltar:hover {
      background: #5a6268;
    }

    @media (max-width: 600px) {
      body {
        padding: 20px 5px;
      }

      .container {
        padding: 15px 4px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      }

      h1 {
        font-size: 20px;
        margin-bottom: 14px;
      }
      label {
        font-size: 13px;
        margin-bottom: 10px;
      }
      input[type="text"],
      select,
      input[type="file"] {
        font-size: 13px;
        padding: 8px 7px;
      }
      button, a.voltar {
        font-size: 14px;
        padding: 11px 5px;
      }
      img#preview {
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
    <h1>Adicionar Nova Imagem</h1>

    <form method="POST" enctype="multipart/form-data">
      <label>Título:
        <input type="text" name="titulo" required>
      </label>

      <label>Legenda:
        <input type="text" name="legenda">
      </label>

      <label>Categoria:
        <select name="categoria_id" required>
          <?php while ($cat = $categorias->fetch_assoc()): ?>
            <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['nome']); ?></option>
          <?php endwhile; ?>
        </select>
      </label>

      <label>Imagem:
        <input type="file" name="imagem" accept="image/*" required>
      </label>

      <!-- Pré-visualização -->
      <img id="preview" src="#" alt="Prévia da imagem" />

      <br><br>
      <button type="submit">Salvar</button>
    </form>

    <a href="galeria-lista.php" class="voltar">← Voltar para a lista</a>
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

<?php
// Fecha a conexão com o banco
$conn->close();
?>