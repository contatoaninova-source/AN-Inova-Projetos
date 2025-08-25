<?php
session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}
?>


<?php
include('../conexao.php');

// Busca todos os registros do carrossel
$registros = $conexao->query("SELECT * FROM carrossel");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Gerenciar Carrossel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f2f4f7;
      padding: 40px 20px;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
      font-size: 28px;
    }

    .nav {
      text-align: center;
      margin-bottom: 30px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
    }

    .nav a {
      display: inline-block;
      background: #007bff;
      color: #fff;
      text-decoration: none;
      padding: 10px 16px;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .nav a:hover {
      background: #0056b3;
    }

    .nav a.voltar {
      background: #6c757d;
    }

    .nav a.voltar:hover {
      background: #5a6268;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    thead {
      background: #007bff;
      color: #fff;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
    }

    tbody tr:nth-child(even) {
      background: #f9f9f9;
    }

    img {
      max-width: 120px;
      height: auto;
      border-radius: 5px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .acoes a {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 14px;
      margin-right: 5px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .acoes a:first-child {
      background: #28a745;
      color: #fff;
    }

    .acoes a:first-child:hover {
      background: #218838;
    }

    .acoes a:last-child {
      background: #dc3545;
      color: #fff;
    }

    .acoes a:last-child:hover {
      background: #c82333;
    }

    td {
      vertical-align: middle;
    }

    /* 📱 Responsividade */
    @media(max-width: 768px) {
      body {
        padding: 20px 10px;
      }

      table {
        display: block;
        width: 100%;
        overflow-x: auto;
      }

      th, td {
        white-space: nowrap;
      }

      h1 {
        font-size: 24px;
      }
    }

    @media(max-width: 480px) {
      .nav a {
        width: 100%;
        text-align: center;
      }

      h1 {
        font-size: 20px;
      }

      img {
        max-width: 100px;
      }

      .acoes a {
        display: block;
        margin: 5px 0;
      }
    }
  </style>
</head>
<body>
  <h1>Gerenciar Imagens do Carrossel</h1>

  <div class="nav">
    <a href="../index.php" class="voltar">← Voltar para o site</a>
    <a href="painel-adm.php" class="voltar">Painel Administrativo</a>
    <a href="carrosel-adicionar.php">+ Adicionar Nova Imagem</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>Imagem</th>
        <th>Legenda</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $registros->fetch_assoc()): ?>
      <tr>
        <td>
          <img src="carrosel-upload/<?= htmlspecialchars($row['imagem']); ?>" alt="Imagem Carrossel">
        </td>
        <td><?= htmlspecialchars($row['legenda']); ?></td>
        <td class="acoes">
          <a href="carrosel-editar.php?id=<?= $row['id']; ?>">Editar</a>
          <a href="carrosel-excluir.php?id=<?= $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>

<?php
// Fecha a conexão com o banco
$conexao->close();
?>