<?php
session_start();
if (!isset($_SESSION["admin_logado"])) {
    header("Location: login-adm.php");
    exit;
}
?>

<?php
include('../conexao.php');

$id = $_GET['id'];

// Busca o registro
$registro = $conexao->query("SELECT * FROM carrossel WHERE id = $id")->fetch_assoc();

// Caminho absoluto do arquivo
$arquivo = __DIR__ . '/carrosel-upload/' . $registro['imagem'];

// Remove o arquivo físico, se existir
if (file_exists($arquivo)) {
    unlink($arquivo);
}

// Deleta o registro do banco
$conexao->query("DELETE FROM carrossel WHERE id = $id");

header('Location: carrosel-lista.php');
exit;
?>
