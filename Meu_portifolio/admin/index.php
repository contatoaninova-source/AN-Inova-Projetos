<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include 'conexao.php';
$projetos = $conexao->query("SELECT * FROM projetos ORDER BY id DESC");
$certificados = $conexao->query("SELECT * FROM certificados ORDER BY id DESC");
include 'header.php';
?>
<h1 style="margin-bottom: 2.5rem; text-align: left;">Painel Administrativo</h1>
<div class="dashboard">
    <div class="dash-card" onclick="window.location='projetos.php'">
        <h2><?= $projetos->num_rows ?></h2>
        <p>Projetos Cadastrados</p>
        <a href="projetos.php" class="dash-action">Gerenciar Projetos</a>
    </div>
    <div class="dash-card" onclick="window.location='certificados.php'">
        <h2><?= $certificados->num_rows ?></h2>
        <p>Certificados Cadastrados</p>
        <a href="certificados.php" class="dash-action">Gerenciar Certificados</a>
    </div>
</div>


<?php include 'footer.php'; ?>