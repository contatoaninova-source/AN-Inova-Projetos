<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php require '_header.php';
$tipo_id = (int)($_GET['tipo_id'] ?? 0);
$tipos = $conexao->query("SELECT id, nome FROM tipos_galeria ORDER BY nome ASC");
$tiposArr = [];
while($t = $tipos->fetch_assoc()) $tiposArr[$t['id']] = $t['nome'];

$sql = "SELECT g.id, g.url, g.alt_text, t.nome as tipo_nome, g.tipo_id
        FROM galeria g
        LEFT JOIN tipos_galeria t ON t.id = g.tipo_id";
if ($tipo_id) $sql .= " WHERE g.tipo_id = $tipo_id";
$sql .= " ORDER BY g.id DESC";
$res = $conexao->query($sql);
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="m-0">Galeria</h3>
  <div class="d-flex gap-2">
    <button class="btn btn-secondary" onclick="window.history.back();">Voltar</button>
  <a href="galeria-form.php" class="btn btn-primary">+ Nova Imagem</a>
</div>
</div>

<form class="row g-2 mb-3" method="get">
  <div class="col-auto">
    <select name="tipo_id" class="form-select" onchange="this.form.submit()">
      <option value="0">— Todos os tipos —</option>
      <?php foreach($tiposArr as $id=>$nome): ?>
        <option value="<?= $id ?>" <?= $tipo_id===$id?'selected':'' ?>><?= htmlspecialchars($nome) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</form>

<div class="row g-3">
<?php while($g = $res->fetch_assoc()): ?>
  <div class="col-md-3">
    <div class="card">
      <img src="../galeria_uploads/<?= htmlspecialchars($g['url']) ?>" class="card-img-top" style="height:180px;object-fit:cover">
      <div class="card-body">
        <div class="small text-secondary mb-1"><?= htmlspecialchars($g['tipo_nome'] ?? 'Sem tipo') ?></div>
        <div class="fw-semibold mb-2"><?= htmlspecialchars($g['alt_text']) ?></div>
        <div class="d-flex gap-2">
          <a class="btn btn-sm btn-outline-light" href="galeria-form.php?id=<?= $g['id'] ?>">Editar</a>
          <a class="btn btn-sm btn-outline-danger" href="galeria-excluir.php?id=<?= $g['id'] ?>"
             onclick="return confirm('Excluir esta imagem?')">Excluir</a>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>
<?php require '_footer.php'; ?>
