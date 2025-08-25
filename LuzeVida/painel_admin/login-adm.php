
<?php
session_start();

$conn = new mysqli("casaderepouso.vpscronos0691.mysql.dbaas.com.br", "casaderepouso", "Casaderepouso2025@", "casaderepouso");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Filtra email
    $email_input = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senha_input = $_POST["senha"];

    $sql = "SELECT id, nome, email, senha FROM admins WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_input);
    $stmt->execute();

    // Vincular colunas do resultado a variáveis
    $stmt->bind_result($id, $nome, $email_db, $senha_db);

    if ($stmt->fetch()) {
        // Comparar a senha do formulário com a senha do banco (aqui é texto puro, cuidado!)
        if ($senha_input === $senha_db) {
            $_SESSION["admin_logado"] = $nome;
            header("Location: painel-adm.php");
            exit;
        } else {
            $erro = "Email ou senha incorretos.";
        }
    } else {
        $erro = "Email ou senha incorretos.";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Casa de Repouso Luz e Vida</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(to bottom, #ffffff, #cce4ff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background-color: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    h1 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color:rgb(0, 0, 0);
    }

    .form-group {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 0.5rem;
      padding: 0.5rem;
      background-color: #f9f9f9;
    }

    .form-group input {
      border: none;
      background: transparent;
      outline: none;
      flex: 1;
      padding-left: 0.5rem;
    }

    .form-group svg {
      width: 20px;
      height: 20px;
      color: #555;
    }

    .btn {
      width: 100%;
      padding: 0.75rem;
      background-color: #1976d2;
      color: white;
      border: none;
      border-radius: 0.5rem;
      font-weight: bold;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #115293;
    }

    .title {
      font-size: 3.3rem;
      margin-bottom: 4rem;
      font-weight: bold;
      color:rgb(0, 0, 0);
      text-align:center
    }
  </style>
</head>
<body>
  <div>
    <h1 class="title">Casa de Repouso<br>Luz e Vida</h1>
    <div class="container">
      <h1>Login</h1>
      <?php if($erro): ?>
        <p style="color:red;"><?= $erro ?></p>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <!-- Ícone de e-mail -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 12H8m8 0a4 4 0 00-8 0 4 4 0 008 0z" />
          </svg>
          <input type="email" name="email" placeholder="Email" required />
        </div>

        <div class="form-group">
          <!-- Ícone de senha -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 14c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z" />
          </svg>
          <input type="password" name="senha" placeholder="Senha" required />
        </div>

        <button type="submit" class="btn">Entrar</button>
      </form>
    </div>
  </div>
</body>
</html>