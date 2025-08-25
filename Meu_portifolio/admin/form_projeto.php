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
$tecnologias = '';
$funcionalidades = '';
$video = '';
$link_projeto = '';
$link_github = '';
$imagem = '';
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conexao->prepare("SELECT * FROM projetos WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $proj = $result->fetch_assoc();
        $titulo = $proj['titulo'];
        $descricao = $proj['descricao'];
        $tecnologias = $proj['tecnologias'];
        $funcionalidades = $proj['funcionalidades'];
        $video = $proj['video'];
        $link_projeto = $proj['link_projeto'];
        $link_github = $proj['link_github'];
        $imagem = $proj['imagem'];
    } else {
        echo "<p>Projeto não encontrado.</p>";
        include 'footer.php';
        exit;
    }
}
if(isset($_POST['salvar'])){
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $tecnologias = $_POST['tecnologias'];
    $funcionalidades = $_POST['funcionalidades'];
    $video = $_POST['video'];
    $link_projeto = $_POST['link_projeto'];
    $link_github = $_POST['link_github'];
    // Upload de imagem
    $imagem = '';
    if(isset($_POST['imagem_atual'])) {
        $imagem = $_POST['imagem_atual'];
    }
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0){
        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg','jpeg','png','webp','gif'];
        if(in_array($ext, $permitidas)){
            $nome_arquivo = uniqid('proj_').'.'.$ext;
            $destino = 'uploads/'.$nome_arquivo;
            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)){
                $imagem = $destino;
            }
        }
    }
    if(!empty($_POST['id'])){
        $id = intval($_POST['id']);
        $stmt = $conexao->prepare("UPDATE projetos SET titulo=?, descricao=?, tecnologias=?, funcionalidades=?, video=?, link_projeto=?, link_github=?, imagem=? WHERE id=?");
        $stmt->bind_param("ssssssssi", $titulo, $descricao, $tecnologias, $funcionalidades, $video, $link_projeto, $link_github, $imagem, $id);
        $stmt->execute();
    } else {
        $stmt = $conexao->prepare("INSERT INTO projetos (titulo, descricao, tecnologias, funcionalidades, video, link_projeto, link_github, imagem) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss", $titulo, $descricao, $tecnologias, $funcionalidades, $video, $link_projeto, $link_github, $imagem);
        $stmt->execute();
    }
    header("Location: projetos.php");
    exit;
}
?>
<h1><?= $id ? 'Editar' : 'Adicionar' ?> Projeto</h1>
<form method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="text" name="titulo" placeholder="Título" required value="<?= htmlspecialchars($titulo) ?>">
    <textarea name="descricao" placeholder="Descrição" required><?= htmlspecialchars($descricao) ?></textarea>
    <input type="text" name="tecnologias" placeholder="Tecnologias (vírgula)" value="<?= htmlspecialchars($tecnologias) ?>">
    <input type="text" name="funcionalidades" placeholder="Funcionalidades (vírgula)" value="<?= htmlspecialchars($funcionalidades) ?>">
    <input type="text" name="video" placeholder="Embed vídeo ou link" value="<?= htmlspecialchars($video) ?>">
    <input type="text" name="link_projeto" placeholder="Link do projeto" value="<?= htmlspecialchars($link_projeto) ?>">
    <input type="text" name="link_github" placeholder="Link GitHub" value="<?= htmlspecialchars($link_github) ?>">
    <!-- Upload de imagem -->
    <label>Imagem do Projeto:</label>
    <input type="file" name="imagem" accept="image/*">
    <?php if($imagem): ?>
        <div style="margin-top:8px">
            <strong>Atual:</strong><br>
            <img src="<?= htmlspecialchars($imagem) ?>" alt="Imagem Atual" style="max-width:140px;max-height:90px;border-radius:8px;">
        </div>
        <input type="hidden" name="imagem_atual" value="<?= htmlspecialchars($imagem) ?>">
    <?php endif; ?>
    <button type="submit" name="salvar" class="btn btn-add"><?= $id ? 'Salvar Alterações' : 'Adicionar' ?></button>
    <a href="projetos.php" class="btn btn-edit">Voltar</a>
</form>
<?php include 'footer.php'; ?>