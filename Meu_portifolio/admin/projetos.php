<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include 'conexao.php';
include 'header.php';

// Deletar projeto e imagem
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    // Remove imagem do disco (opcional)
    $stmt = $conexao->prepare("SELECT imagem FROM projetos WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if($row = $res->fetch_assoc()){
        if($row['imagem'] && file_exists($row['imagem'])){
            unlink($row['imagem']);
        }
    }
    $stmt = $conexao->prepare("DELETE FROM projetos WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: projetos.php");
    exit;
}
$result = $conexao->query("SELECT * FROM projetos ORDER BY id DESC");
?>
<h1>Projetos</h1>
<div style="text-align:right;max-width:950px;margin:0 auto 1.2rem auto;">
    <a href="form_projeto.php" class="btn btn-add">+ Adicionar Projeto</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Título</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php while($p = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($p['id']) ?></td>
            <td>
                <?php if(!empty($p['imagem']) && file_exists($p['imagem'])): ?>
                    <img src="<?= htmlspecialchars($p['imagem']) ?>" alt="img" style="max-width:70px;max-height:45px;border-radius:6px;">
                <?php else: ?>
                    <span style="color:#ccc">-</span>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($p['titulo']) ?></td>
            <td>
                <a href="form_projeto.php?id=<?= $p['id'] ?>" class="btn btn-edit">Editar</a>
                <a href="projetos.php?delete=<?= $p['id'] ?>" onclick="return confirm('Deseja deletar?')" class="btn btn-delete">Deletar</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>