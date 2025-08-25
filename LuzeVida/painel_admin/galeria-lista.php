<?php

$host = "casaderepouso.vpscronos0691.mysql.dbaas.com.br";
$usuario = "casaderepouso";
$senha = "Casaderepouso2025@"; 
$banco = "casaderepouso";

// Conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se deu erro
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}


session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}

// Consulta as imagens da galeria com o nome da categoria
$sql = "SELECT galeria.*, categoria.nome AS nome_categoria FROM galeria 
        JOIN categoria ON galeria.categoria_id = categoria.id
        ORDER BY galeria.id DESC";
$result = $conexao->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Admin - Galeria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f2f4f7;
      margin: 40px;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    .nav {
      text-align: center;
      margin-bottom: 30px;
    }

    .nav a {
      display: inline-block;
      background: #007bff;
      color: #fff;
      text-decoration: none;
      padding: 10px 16px;
      border-radius: 5px;
      margin: 5px;
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

    .table-wrapper {
      width: 100%;
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      min-width: 800px;
    }

    thead {
      background: #007bff;
      color: #fff;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      vertical-align: middle;
      word-break: break-word;
    }

    tbody tr:nth-child(even) {
      background: #f9f9f9;
    }

    img {
      max-width: 100px;
      height: auto;
      border-radius: 5px;
      object-fit: cover;
    }

    .acoes a {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 14px;
      margin-right: 5px;
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

    @media (max-width: 900px) {
      table {
        min-width: 600px;
      }
      img {
        max-width: 70px;
      }
    }

    @media (max-width: 768px) {
      body {
        margin: 10px;
        padding: 0;
      }

      .nav a {
        padding: 8px 10px;
        font-size: 15px;
      }

      img {
        max-width: 60px;
      }
      table {
        min-width: 500px;
      }
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 1.2rem;
      }

      .nav {
        margin-bottom: 18px;
      }

      /* Stack nav links vertically on mobile */
      .nav a {
        display: block;
        margin: 7px auto;
        width: 100%;
        max-width: 350px;
      }

      .table-wrapper {
        padding: 0;
        margin: 0;
      }

      /* Cards for each row */
      table, thead, tbody, tr, th, td {
        display: block;
      }

      thead {
        display: none;
      }

      table {
        min-width: unset;
        box-shadow: none;
        border-radius: 0;
        background: none;
      }

      tbody tr {
        background: #fff;
        margin-bottom: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.09);
        padding: 14px 10px;
        display: block;
        border: 1px solid #e5e5e5;
      }

      td {
        padding: 8px 10px;
        text-align: left;
        border: none;
        position: relative;
        display: flex;
        align-items: center;
      }

      td:before {
        content: attr(data-label);
        font-weight: bold;
        color: #007bff;
        width: 95px;
        flex-shrink: 0;
        display: inline-block;
        margin-right: 8px;
        font-size: 13px;
      }

      .acoes {
        margin-top: 8px;
        display: flex;
        gap: 8px;
      }
    }

    @media (max-width: 400px) {
      img {
        max-width: 45px;
      }
      .nav a {
        font-size: 13px;
        max-width: 95vw;
      }
      td:before {
        width: 68px;
        font-size: 12px;
      }
    }

    </style>
</head>
<body>
    <h1>Painel Administrativo - Galeria</h1>
    
    <div class="nav">
      <a href="../index.php" class="voltar">← Voltar para o site</a>
      <a href="painel-adm.php" class="voltar">Painel Administrativo</a>
      <a href="galeria-adicionar.php">+ Adicionar Nova Imagem</a>
    </div>

    <div class="table-wrapper">
      <table>
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Imagem</th>
                  <th>Legenda</th>
                  <th>Categoria</th>
                  <th>Data</th>
                  <th>Ações</th>
              </tr>
          </thead>
          <tbody>
              <?php if ($result && $result->num_rows > 0): ?>
                  <?php while ($row = $result->fetch_assoc()): ?>
                      <tr>
                          <td data-label="ID"><?php echo $row['id']; ?></td>
                          <td data-label="Título"><?php echo htmlspecialchars($row['titulo']); ?></td>
                          <td data-label="Imagem">
                              <img src="galeria-upload/<?php echo htmlspecialchars($row['caminho']); ?>" alt="Imagem" />
                          </td>
                          <td data-label="Legenda"><?php echo htmlspecialchars($row['legenda']); ?></td>
                          <td data-label="Categoria"><?php echo htmlspecialchars($row['nome_categoria']); ?></td>
                          <td data-label="Data"><?php echo $row['criado_em']; ?></td>
                          <td class="acoes" data-label="Ações">
                              <a href="galeria-editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                              <a href="galeria-excluir.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                          </td>
                      </tr>
                  <?php endwhile; ?>
              <?php else: ?>
                  <tr>
                      <td colspan="7">Nenhuma imagem encontrada.</td>
                  </tr>
              <?php endif; ?>
          </tbody>
      </table>
    </div>
</body>
</html>

<?php
// Fecha a conexão com o banco
$conexao->close();
?>