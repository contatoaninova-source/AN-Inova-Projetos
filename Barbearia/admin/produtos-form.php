<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php require '_header.php'; require 'utils-upload.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$editando = $id > 0;
$produto = ['nome'=>'','descricao'=>'','preco'=>'','imagem'=>null];

if ($editando) {
  $stmt = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
  $stmt->bind_param('i',$id);
  $stmt->execute();
  $r = $stmt->get_result()->fetch_assoc();
  if ($r) $produto = $r;
}

$erro = null;
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $nome = trim($_POST['nome'] ?? '');
  $descricao = trim($_POST['descricao'] ?? '');
  $preco = str_replace(',','.', $_POST['preco'] ?? '0');

  if ($nome==='') $erro = 'Informe o nome do produto.';
  if (!$erro && !is_numeric($preco)) $erro = 'Preço inválido.';

  // upload (opcional)
  if (!$erro) {
    $upload = upload_imagem($_FILES['imagem'] ?? [], '../produtos_uploads/', 5);
    if (!$upload['ok']) $erro = $upload['erro'];
  }

  if (!$erro) {
    if ($editando) {
      // troca de imagem? remove antiga
      if (!empty($upload['nome'])) {
        remover_arquivo('../produtos_uploads/', $produto['imagem']);
        $produto['imagem'] = $upload['nome'];
      }
      $stmt = $conexao->prepare("UPDATE produtos SET nome=?, descricao=?, preco=?, imagem=? WHERE id=?");
      $stmt->bind_param('ssdsi', $nome, $descricao, $preco, $produto['imagem'], $id);
      $stmt->execute();
    } else {
      $img = $upload['nome'] ?? null;
      $stmt = $conexao->prepare("INSERT INTO produtos (nome, descricao, preco, imagem) VALUES (?,?,?,?)");
      $stmt->bind_param('ssds', $nome, $descricao, $preco, $img);
      $stmt->execute();
    }
    header('Location: produtos-lista.php'); exit;
  }
}
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="m-0"><?= $editando ? 'Editar Produto' : 'Novo Produto' ?></h3>
  <a class="btn btn-outline-light" href="produtos-lista.php">Voltar</a>
</div>

<?php if($erro): ?><div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div><?php endif; ?>

<form method="post" enctype="multipart/form-data" class="card p-3">
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Nome *</label>
      <input type="text" name="nome" class="form-control" required value="<?= htmlspecialchars($produto['nome']) ?>">
    </div>
    <div class="col-md-3">
      <label class="form-label">Preço *</label>
      <input type="text" name="preco" class="form-control" required
             value="<?= $produto['preco'] !== '' ? number_format((float)$produto['preco'],2,',','.') : '' ?>">
    </div>
    <div class="col-md-12">
      <label class="form-label">Descrição</label>
      <textarea name="descricao" rows="5" class="form-control"><?= htmlspecialchars($produto['descricao']) ?></textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">Imagem (JPG/PNG/WEBP, máx 5MB)</label>
      <input type="file" name="imagem" class="form-control">
      <?php if($produto['imagem']): ?>
        <div class="mt-2">
          <img src="../produtos_uploads/<?= htmlspecialchars($produto['imagem']) ?>" style="height:120px;border-radius:8px;object-fit:cover">
        </div>
      <?php endif; ?>
    </div>
    <div class="col-12">
      <button class="btn btn-primary"><?= $editando ? 'Salvar alterações' : 'Cadastrar' ?></button>
    </div>
  </div>
</form>
<?php require '_footer.php'; ?>
