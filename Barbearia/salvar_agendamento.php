<?php
// salvar_agendamento.php
include 'conexao.php'; // conexão com banco

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome       = $_POST['nome'] ?? '';
    $telefone   = $_POST['telefone'] ?? '';
    $data       = $_POST['data'] ?? '';
    $hora       = $_POST['hora'] ?? '';
    $observacao = $_POST['observacao'] ?? '';

    if ($nome && $telefone && $data && $hora) {
        $sql = "INSERT INTO agendamentos (nome, telefone, data, hora, observacao) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssss", $nome, $telefone, $data, $hora, $observacao);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Agendamento realizado com sucesso!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao salvar."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Preencha todos os campos obrigatórios."]);
    }
}
?>
