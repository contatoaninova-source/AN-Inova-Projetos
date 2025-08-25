<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php require '_header.php'; ?>

<?php
require 'utils-upload.php';


// Obtém o ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    // Busca o produto para pegar a imagem
    $stmt = $conexao->prepare("SELECT imagem FROM produtos WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultado = $stmt->get_result()->fetch_assoc();

    if ($resultado && !empty($resultado['imagem'])) {
        // Remove a imagem do servidor
        remover_arquivo('../produtos_uploads/', $resultado['imagem']);
    }

    // Exclui o produto do banco
    $stmt = $conexao->prepare("DELETE FROM produtos WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Redireciona para a lista
header('Location: produtos-lista.php');
exit;
?>
