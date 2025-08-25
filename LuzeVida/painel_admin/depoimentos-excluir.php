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
$conexao->query("DELETE FROM depoimentos WHERE id = $id");
header('Location: depoimentos-lista.php');
exit;
?>
