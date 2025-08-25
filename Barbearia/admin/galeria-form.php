<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php require '_header.php'; require 'utils-upload.php';

$id = (int)($_GET['id'] ?? 0);
$editando = $id > 0;
$img = ['url'=>null,'alt_text'=>'','tipo_id'=>null];

$tipos = $conexao->query("SELECT id, nome FROM tipos_galeria ORDER BY nome ASC");

if ($editando) {
  $stmt = $conexao->prepare("SELECT * FROM galeria WHERE id=?");
  $stmt->bind_param('i',$id); $stmt->execute();
  $r = $stmt->get_result()->fetch_assoc();
  if ($r) $img = $r;
}

$erro = null;
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $alt = trim($_POST['alt_text'] ?? '');
  $tipo_id = (int)($_POST['tipo_id'] ?? 0);

  if ($alt==='') $erro = 'Informe o texto alternativo (descrição).';

  // upload opcional
  if (!$erro) {
    $upload = upload_imagem($_FILES['arquivo'] ?? [], '../galeria_uploads/', 5);
    if (!$upload['ok']) $erro = $upload['erro'];
  }

  if (!$erro) {
    if ($editando) {
      if (!empty($upload['nome'])) {
        remover_arquivo('../galeria_uploads/', $img['url']);
        $img['url'] = $upload['nome'];
      }
      $stmt = $conexao->prepare("UPDATE galeria SET url=?, alt_text=?, tipo_id=? WHERE id=?");
      $stmt->bind_param('ssii', $img['url'], $alt, $tipo_id, $id);
      $stmt->execute();
    } else {
      $url = $upload['nome'] ?? null;
      if (!$url) $erro = 'Selecione uma imagem para enviar.';
      if (!$erro) {
        $stmt = $conexao->prepare("INSERT INTO galeria (url, alt_text, tipo_id) VALUES (?,?,?)");
        $stmt->bind_param('ssi', $url, $alt, $tipo_id);
        $stmt->execute();
      }
    }
    if (!$erro) { header('Location: galeria-lista.php'); exit; }
  }
}
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="m-0"><?= $editando ? 'Editar Imagem' : 'Nova Imagem' ?></h3>
  <a class="btn btn-outline-light" href="galeria-lista.php">Voltar</a>
</div>

<?php if($erro): ?><div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div><?php endif; ?>

<form method="post" enctype="multipart/form-data" class="card p-3">
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Imagem (JPG/PNG/WEBP, máx 5MB)</label>
      <input type="file" name="arquivo" class="form-control" <?= $editando?'':'required' ?>>
      <?php if($img['url']): ?>
        <div class="mt-2">
          <img src="../galeria_uploads/<?= htmlspecialchars($img['url']) ?>" style="height:160px;border-radius:8px;object-fit:cover">
        </div>
      <?php endif; ?>
    </div>
    <div class="col-md-6">
      <label class="form-label">Tipo</label>
      <select name="tipo_id" class="form-select">
        <option value="0">— Sem tipo —</option>
        <?php
        $tipos->data_seek(0);
        while($t = $tipos->fetch_assoc()):
        ?>
          <option value="<?= $t['id'] ?>" <?= (int)$img['tipo_id']===(int)$t['id']?'selected':'' ?>>
            <?= htmlspecialchars($t['nome']) ?>
          </option>
        <?php endwhile; ?>
      </select>
      <div class="form-text">Gerencie os tipos em <a href="tipos-lista.php">Tipos de Galeria</a>.</div>
    </div>
    <div class="col-md-12">
      <label class="form-label">Texto alternativo (descrição) *</label>
      <input type="text" name="alt_text" class="form-control" required value="<?= htmlspecialchars($img['alt_text']) ?>">
    </div>
    <div class="col-12">
      <button class="btn btn-primary"><?= $editando ? 'Salvar alterações' : 'Cadastrar' ?></button>
    </div>
  </div>
</form>
<?php require '_footer.php'; ?>
