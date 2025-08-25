<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'portifolio_db';
$con = new mysqli($host, $user, $pass, $dbname);
if ($con->connect_error) {
    die("Erro de conexão.");
}
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario'], $_POST['senha'])) {
    $usuario = trim($_POST['usuario']);
    $senha = $_POST['senha'];
    $stmt = $con->prepare("SELECT id, usuario, senha FROM usuario WHERE usuario = ? LIMIT 1");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($user = $result->fetch_assoc()) {
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['usuario_id'] = $user['id'];
            header("Location: index.php");
            exit;
        }
    }
    $msg = "Usuário ou senha inválidos.";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Entrar no Painel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        background: linear-gradient(120deg, #232526, #414345);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Arial, sans-serif;
        margin: 0;
    }
    .login-box {
        max-width: 400px;
        width: 100%;
        padding: 2.5rem 2rem;
        background: #191919;
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.18);
        text-align: center;
        border: 1.5px solid #e50914;
    }
    .login-box h2 {
        color: #e50914;
        margin-bottom: 1.3rem;
        font-size: 2rem;
        font-weight: bold;
        letter-spacing: 1px;
    }
    .login-box input {
        width: 100%;
        margin-bottom: 1.1rem;
        padding: 13px 12px;
        border: 1.5px solid #e50914;
        border-radius: 9px;
        background: #232323;
        color: #fafafa;
        font-size: 1rem;
        outline: none;
        transition: border .2s;
    }
    .login-box input:focus {
        border-color: #ff3b3b;
    }
    .login-box button {
        width: 100%;
        background: #e50914;
        color: #fff;
        padding: 14px 0;
        border: none;
        border-radius: 40px;
        font-weight: 700;
        font-size: 1.1rem;
        letter-spacing: .5px;
        cursor: pointer;
        margin-top: 8px;
        box-shadow: 0 3px 12px rgba(229,9,20,0.11);
        transition: background .2s;
    }
    .login-box button:hover, .login-box button:focus {
        background: #ff3b3b;
    }
    .login-msg {
        color: #ff3b3b;
        margin-bottom: 1.2rem;
        font-weight: 600;
        letter-spacing: .2px;
    }
    @media (max-width: 500px) {
        .login-box { padding: 2rem 1rem; }
        .login-box h2 { font-size: 1.35rem; }
    }
    </style>
</head>
<body>
    <form class="login-box" method="post" autocomplete="off" spellcheck="false">
        <h2>Entrar no Painel</h2>
        <?php if ($msg): ?>
            <div class="login-msg"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>
        <input type="text" name="usuario" placeholder="Usuário (E-mail)" required autofocus maxlength="80" autocomplete="username">
        <input type="password" name="senha" placeholder="Senha" required maxlength="64" autocomplete="current-password">
        <button type="submit">Acessar</button>
    </form>
</body>
</html>