<?php
header('Content-Type: application/json');
$mysqli = new mysqli("localhost", "usuario", "senha", "banco");
if ($mysqli->connect_error) { echo json_encode([]); exit; }

$res = $mysqli->query("SELECT data, horario FROM agendamentos");
$ocupados = [];
while($row = $res->fetch_assoc()){
    $ocupados[$row['data']][] = $row['horario'];
}
echo json_encode($ocupados);
