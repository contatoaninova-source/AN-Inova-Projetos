<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php
require '_header.php'; require 'utils-upload.php';
$id = (int)($_GET['id'] ?? 0);
if ($id) {
  $stmt = $conexao->prepare("SELECT url FROM galeria WHERE id=?");
  $stmt->bind_param('i',$id); $stmt->execute();
  $url = ($stmt->get_result()->fetch_assoc())['url'] ?? null;

  $stmt = $conexao->prepare("DELETE FROM galeria WHERE id=?");
  $stmt->bind_param('i',$id); $stmt->execute();

  remover_arquivo('../galeria_uploads/', $url);
}
header('Location: galeria-lista.php'); exit;
