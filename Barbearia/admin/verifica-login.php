<?php
session_start();
require 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
$stmt = $conexao->prepare($sql);
$senhaHash = md5($senha);
$stmt->bind_param("ss", $email, $senhaHash);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome'];
    header("Location: admin/index.php");
    exit;
} else {
    echo "<script>alert('E-mail ou senha inválidos!');window.location.href='login.php';</script>";
}
