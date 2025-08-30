<?php

$host = "localhost";

$usuario = "root";

$senha = ""; 

$banco = "casaderepouso";



// Conexão

$conexao = new mysqli($host, $usuario, $senha, $banco);



// Verifica se deu erro

if ($conexao->connect_error) {

    die("Erro na conexão: " . $conexao->connect_error);

}

?>

