<?php
$host = "casaderepouso.vpscronos0691.mysql.dbaas.com.br";
$usuario = "casaderepouso";
$senha = "Casaderepouso2025@"; 
$banco = "casaderepouso";

// Conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se deu erro
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
