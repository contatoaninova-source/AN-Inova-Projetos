<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include 'conexao.php';
include 'header.php';
// Deleção
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $stmt = $conexao->prepare("SELECT media FROM certificados WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if($row = $res->fetch_assoc()){
        if($row['media'] && file_exists($row['media'])){
            unlink($row['media']);
        }
    }
    $stmt = $conexao->prepare("DELETE FROM certificados WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: certificados.php");
    exit;
}
$result = $conexao->query("SELECT * FROM certificados ORDER BY id DESC");
?>
<h1>Certificados</h1>
<div style="text-align:right;max-width:950px;margin:0 auto 1.2rem auto;">
    <a href="form_certificado.php" class="btn btn-add">+ Adicionar Certificado</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php while($c = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($c['id']) ?></td>
            <td><?= htmlspecialchars($c['titulo']) ?></td>
            <td>
                <?php if($c['media'] && file_exists($c['media'])): ?>
                    <img src="<?= htmlspecialchars($c['media']) ?>" alt="img" style="max-width:70px;max-height:45px;border-radius:6px;">
                <?php else: ?>
                    <span style="color:#ccc">-</span>
                <?php endif; ?>
            </td>
            <td>
                <a href="form_certificado.php?id=<?= $c['id'] ?>" class="btn btn-edit">Editar</a>
                <a href="certificados.php?delete=<?= $c['id'] ?>" onclick="return confirm('Deseja deletar?')" class="btn btn-delete">Deletar</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>