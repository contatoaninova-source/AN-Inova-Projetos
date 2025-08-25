<?php
session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}
?>


<?php
include('../conexao.php');

$registros = $conexao->query("SELECT * FROM depoimentos ORDER BY criado_em DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gerenciar Depoimentos</title>
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
      margin-bottom: 25px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
    }

    .nav a {
      display: inline-block;
      background: #007bff;
      color: white;
      padding: 10px 16px;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease;
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
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    thead {
      background: #007bff;
      color: white;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
    }

    tbody tr:nth-child(even) {
      background: #f9f9f9;
    }

    iframe {
      border-radius: 6px;
      max-width: 100%;
      height: auto;
      aspect-ratio: 16/9;
    }

    .acoes a {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 14px;
      margin-right: 6px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .acoes a:first-child {
      background: #28a745;
      color: white;
    }

    .acoes a:first-child:hover {
      background: #218838;
    }

    .acoes a:last-child {
      background: #dc3545;
      color: white;
    }

    .acoes a:last-child:hover {
      background: #c82333;
    }

    td {
      vertical-align: top;
    }

    /* 📱 Responsividade */
    @media (max-width: 768px) {
      body {
        padding: 20px 10px;
      }

      h1 {
        font-size: 24px;
      }

      table {
        display: block;
        width: 100%;
        overflow-x: auto;
      }

      th, td {
        white-space: nowrap;
      }
    }

    @media (max-width: 480px) {
      .nav a {
        width: 100%;
        text-align: center;
      }

      h1 {
        font-size: 20px;
      }

      .acoes a {
        display: block;
        margin: 5px 0;
      }
    }
  </style>
</head>
<body>

<h1>Gerenciar Depoimentos</h1>

<div class="nav">
  <a href="../index.php" class="voltar">← Voltar para o site</a>
  <a href="painel-adm.php" class="voltar">Painel Administrativo</a>
  <a href="depoimentos-adicionar.php">+ Adicionar Novo Depoimento</a>
</div>

<table>
<thead>
<tr><th>ID</th><th>Título</th><th>Vídeo</th><th>Ações</th></tr>
</thead>
<tbody>
<?php while($row = $registros->fetch_assoc()): ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= htmlspecialchars($row['titulo']) ?></td>
  <td>
    <?php
    if (strpos($row['link'], 'youtube.com/watch?v=') !== false) {
      parse_str(parse_url($row['link'], PHP_URL_QUERY), $url_params);
      $video_id = $url_params['v'] ?? '';
      if ($video_id) {
        $embed = 'https://www.youtube.com/embed/' . $video_id;
        echo "<iframe src='$embed' frameborder='0' allowfullscreen></iframe>";
      } else {
        echo "<a href='{$row['link']}' target='_blank'>Ver vídeo</a>";
      }
    } else {
      echo "<a href='{$row['link']}' target='_blank'>Ver vídeo</a>";
    }
    ?>
  </td>
  <td class="acoes">
    <a href='depoimentos-editar.php?id=<?= $row['id'] ?>'>Editar</a>
    <a href='depoimentos-excluir.php?id=<?= $row['id'] ?>' onclick="return confirm('Tem certeza que quer excluir?')">Excluir</a>
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