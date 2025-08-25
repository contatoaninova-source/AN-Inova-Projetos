<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php require '_header.php'; ?>
<?php
$res = $conexao->query("SELECT id, nome FROM tipos_galeria ORDER BY nome ASC");
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="m-0">Tipos de Galeria</h3>
  <div class="d-flex gap-2">
    <button class="btn btn-secondary" onclick="window.history.back();">Voltar</button>
    <a href="tipos-form.php" class="btn btn-primary">+ Novo Tipo</a>
  </div>
</div>

<div class="card p-0">
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead><tr><th>#</th><th>Nome</th><th class="text-end">Ações</th></tr></thead>
      <tbody>
      <?php while($t = $res->fetch_assoc()): ?>
        <tr>
          <td><?= $t['id'] ?></td>
          <td><?= htmlspecialchars($t['nome']) ?></td>
          <td class="text-end">
            <a class="btn btn-sm btn-outline-light" href="tipos-form.php?id=<?= $t['id'] ?>">Editar</a>
            <a class="btn btn-sm btn-outline-danger" href="tipos-form.php?delete=<?= $t['id'] ?>"
               onclick="return confirm('Excluir este tipo? (imagens existentes manterão o tipo_id)')">Excluir</a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require '_footer.php'; ?>
