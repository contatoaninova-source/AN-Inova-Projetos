<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php require '_header.php';

$id = (int)($_GET['id'] ?? 0);
$delete = (int)($_GET['delete'] ?? 0);

if ($delete) {
  $stmt = $conexao->prepare("DELETE FROM tipos_galeria WHERE id=?");
  $stmt->bind_param('i',$delete);
  $stmt->execute();
  header('Location: tipos-lista.php'); exit;
}

$tipo = ['nome'=>''];
if ($id) {
  $stmt = $conexao->prepare("SELECT * FROM tipos_galeria WHERE id=?");
  $stmt->bind_param('i',$id); $stmt->execute();
  $r = $stmt->get_result()->fetch_assoc();
  if ($r) $tipo = $r;
}

if ($_SERVER['REQUEST_METHOD']==='POST') {
  $nome = trim($_POST['nome'] ?? '');
  if ($id) {
    $stmt = $conexao->prepare("UPDATE tipos_galeria SET nome=? WHERE id=?");
    $stmt->bind_param('si',$nome,$id);
  } else {
    $stmt = $conexao->prepare("INSERT INTO tipos_galeria (nome) VALUES (?)");
    $stmt->bind_param('s',$nome);
  }
  $stmt->execute();
  header('Location: tipos-lista.php'); exit;
}
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="m-0"><?= $id ? 'Editar Tipo' : 'Novo Tipo' ?></h3>
  <a class="btn btn-outline-light" href="tipos-lista.php">Voltar</a>
</div>

<form method="post" class="card p-3">
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Nome *</label>
      <input type="text" name="nome" class="form-control" required value="<?= htmlspecialchars($tipo['nome']) ?>">
    </div>
    <div class="col-12">
      <button class="btn btn-primary"><?= $id ? 'Salvar' : 'Cadastrar' ?></button>
    </div>
  </div>
</form>
<?php require '_footer.php'; ?>
