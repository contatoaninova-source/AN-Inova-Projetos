<?php
session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}

$conn = new mysqli('casaderepouso.vpscronos0691.mysql.dbaas.com.br', 'casaderepouso', 'Casaderepouso2025@', 'casaderepouso');
if ($conn->connect_error) {
    die('Erro: ' . $conn->connect_error);
}

$id = $_GET['id'] ?? 0;
$upload_dir = 'galeria-upload/';

// Busca imagem (sem usar get_result)
$stmt = $conn->prepare("SELECT caminho FROM galeria WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($caminho);
$stmt->fetch();
$stmt->close();

// Se encontrou a imagem, tenta apagar o arquivo
if (!empty($caminho) && file_exists($upload_dir . $caminho)) {
    @unlink($upload_dir . $caminho);
}

// Exclui do banco
$stmt = $conn->prepare("DELETE FROM galeria WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

// Redireciona
header("Location: galeria-lista.php");
exit;
?>
