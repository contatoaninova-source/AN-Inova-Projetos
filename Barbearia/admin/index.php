<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php require '_header.php'; ?>
<div class="row g-3">
  <div class="col-md-4">
    <div class="card p-3">
      <h5 class="mb-2">Produtos</h5>
      <a class="btn btn-primary" href="produtos-lista.php">Gerenciar</a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-3">
      <h5 class="mb-2">Galeria</h5>
      <a class="btn btn-primary" href="galeria-lista.php">Gerenciar</a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-3">
      <h5 class="mb-2">Tipos de Galeria</h5>
      <a class="btn btn-primary" href="tipos-lista.php">Gerenciar</a>
    </div>
  </div>
</div>
<?php require '_footer.php'; ?>
