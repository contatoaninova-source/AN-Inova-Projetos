<?php
$host = "localhost";
$db   = "portifolio_db";
$user = "root";
$pass = "";

$conexao = new mysqli($host, $user, $pass, $db);
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
?>
