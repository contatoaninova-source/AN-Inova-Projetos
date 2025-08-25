<?php
// =======================
// conexao.php — Conexão com o banco
// =======================

// Dados de conexão
$servidor = "localhost";        // Ou IP do servidor do banco
$usuario  = "root";      // Usuário do banco
$senha    = "";        // Senha do banco
$banco    = "agenda_facil";    // Nome do banco de dados

// Criar conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar se houve erro de conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Opcional: definir charset para UTF-8
$conexao->set_charset("utf8");
?>
