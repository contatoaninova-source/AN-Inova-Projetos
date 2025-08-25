<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include 'conexao.php';
include 'header.php';
$id = '';
$titulo = '';
$descricao = '';
$detalhes = '';
$media = '';
$link = '';
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conexao->prepare("SELECT * FROM certificados WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $cert = $result->fetch_assoc();
        $titulo = $cert['titulo'];
        $descricao = $cert['descricao'];
        $detalhes = $cert['detalhes'];
        $media = $cert['media'];
        $link = $cert['link'];
    } else {
        echo "<p>Certificado não encontrado.</p>";
        include 'footer.php';
        exit;
    }
}
if(isset($_POST['salvar'])){
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $detalhes = $_POST['detalhes'];
    $link = $_POST['link'];
    $media = '';
    if(isset($_POST['imagem_atual'])) {
        $media = $_POST['imagem_atual'];
    }
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0){
        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg','jpeg','png','webp','gif'];
        if(in_array($ext, $permitidas)){
            $nome_arquivo = uniqid('cert_').'.'.$ext;
            $destino = 'uploads/'.$nome_arquivo;
            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)){
                $media = $destino;
            }
        }
    }
    if(!empty($_POST['id'])){
        $id = intval($_POST['id']);
        $stmt = $conexao->prepare("UPDATE certificados SET titulo=?, descricao=?, detalhes=?, media=?, link=? WHERE id=?");
        $stmt->bind_param("sssssi", $titulo, $descricao, $detalhes, $media, $link, $id);
        $stmt->execute();
    } else {
        $stmt = $conexao->prepare("INSERT INTO certificados (titulo, descricao, detalhes, media, link) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $titulo, $descricao, $detalhes, $media, $link);
        $stmt->execute();
    }
    header("Location: certificados.php");
    exit;
}
?>
<h1><?= $id ? 'Editar' : 'Adicionar' ?> Certificado</h1>
<form method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="text" name="titulo" placeholder="Título" required value="<?= htmlspecialchars($titulo) ?>">
    <textarea name="descricao" placeholder="Descrição" required><?= htmlspecialchars($descricao) ?></textarea>
    <input type="text" name="detalhes" placeholder="Detalhes (vírgula)" value="<?= htmlspecialchars($detalhes) ?>">
    <input type="text" name="link" placeholder="Link" value="<?= htmlspecialchars($link) ?>">
    <!-- Upload de imagem -->
    <label>Imagem do Certificado:</label>
    <input type="file" name="imagem" accept="image/*">
    <?php if($media): ?>
        <div style="margin-top:8px">
            <strong>Atual:</strong><br>
            <img src="<?= htmlspecialchars($media) ?>" alt="Imagem Atual" style="max-width:140px;max-height:90px;border-radius:8px;">
        </div>
        <input type="hidden" name="imagem_atual" value="<?= htmlspecialchars($media) ?>">
    <?php endif; ?>
    <button type="submit" name="salvar" class="btn btn-add"><?= $id ? 'Salvar Alterações' : 'Adicionar' ?></button>
    <a href="certificados.php" class="btn btn-edit">Voltar</a>
</form>
<?php include 'footer.php'; ?>