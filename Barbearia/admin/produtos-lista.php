<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php require '_header.php'; ?>
<?php
$busca = $_GET['q'] ?? '';
$sql = "SELECT id, nome, preco, imagem FROM produtos";
$params = [];
if ($busca !== '') {
  $sql .= " WHERE nome LIKE ?";
  $like = "%{$busca}%";
  $params[] = $like;
}
$sql .= " ORDER BY id DESC";

$stmt = $conexao->prepare($sql);
if ($params) $stmt->bind_param('s', $like);
$stmt->execute();
$res = $stmt->get_result();
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="m-0">Produtos</h3>
  <div class="d-flex gap-2">
    <button class="btn btn-secondary" onclick="window.history.back();">Voltar</button>
  <a href="produtos-form.php" class="btn btn-primary">+ Novo Produto</a>
</div>
</div>

<form class="row g-2 mb-3" method="get">
  <div class="col-auto">
    <input type="text" name="q" value="<?= htmlspecialchars($busca) ?>" class="form-control" placeholder="Buscar por nome">
  </div>
  <div class="col-auto">
    <button class="btn btn-outline-light">Buscar</button>
  </div>
</form>

<div class="card p-0">
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead><tr><th>#</th><th>Imagem</th><th>Nome</th><th>Preço</th><th class="text-end">Ações</th></tr></thead>
      <tbody>
      <?php while($p = $res->fetch_assoc()): ?>
        <tr>
          <td><?= $p['id'] ?></td>
          <td style="width:90px">
            <?php if($p['imagem']): ?>
              <img src="../produtos_uploads/<?= htmlspecialchars($p['imagem']) ?>" alt="" style="width:70px;height:70px;object-fit:cover;border-radius:8px">
            <?php endif; ?>
          </td>
          <td><?= htmlspecialchars($p['nome']) ?></td>
          <td>R$ <?= number_format((float)$p['preco'],2,',','.') ?></td>
          <td class="text-end">
            <a class="btn btn-sm btn-outline-light" href="produtos-form.php?id=<?= $p['id'] ?>">Editar</a>
            <a class="btn btn-sm btn-outline-danger" href="produtos-excluir.php?id=<?= $p['id'] ?>"
               onclick="return confirm('Excluir este produto?')">Excluir</a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require '_footer.php'; ?>
