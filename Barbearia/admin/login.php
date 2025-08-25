<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Painel Admin</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; }
        .login-container { width: 300px; margin: 100px auto; padding: 20px; background: #fff; border-radius: 8px; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { width: 100%; padding: 10px; background: #333; color: #fff; border: none; }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="verifica-login.php">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
