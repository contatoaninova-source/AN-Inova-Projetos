<?php
// Conexão com o banco de dados
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "portifolio_db";
$conexao = new mysqli($servidor, $usuario, $senha, $banco);
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
$conexao->set_charset("utf8mb4");
?>