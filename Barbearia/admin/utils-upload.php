<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/index.php");
    exit;
}
?>

<?php
/**
 * Faz upload seguro de uma imagem.
 * @param array  $file   $_FILES['campo']
 * @param string $dir    diretório destino (com barra no final), ex: '../produtos_uploads/'
 * @param int    $maxMB  tamanho máximo em MB
 * @return array [ok => bool, nome => string|null, erro => string|null]
 */
function upload_imagem(array $file, string $dir, int $maxMB = 5): array {
    if (!isset($file) || $file['error'] === UPLOAD_ERR_NO_FILE) {
        return ['ok'=>true, 'nome'=>null, 'erro'=>null]; // upload opcional
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['ok'=>false, 'nome'=>null, 'erro'=>'Falha ao enviar arquivo (código '.$file['error'].').'];
    }

    if (!is_dir($dir)) {
        @mkdir($dir, 0775, true);
    }

    $permitidos = ['image/jpeg'=>'jpg', 'image/png'=>'png', 'image/webp'=>'webp'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime  = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!isset($permitidos[$mime])) {
        return ['ok'=>false, 'nome'=>null, 'erro'=>'Formato inválido. Envie JPG, PNG ou WEBP.'];
    }

    $maxBytes = $maxMB * 1024 * 1024;
    if ($file['size'] > $maxBytes) {
        return ['ok'=>false, 'nome'=>null, 'erro'=>"Arquivo muito grande. Máximo {$maxMB}MB."];
    }

    $ext = $permitidos[$mime];
    $novoNome = bin2hex(random_bytes(8)) . '.' . $ext;
    $destino  = rtrim($dir, '/').'/'.$novoNome;

    if (!move_uploaded_file($file['tmp_name'], $destino)) {
        return ['ok'=>false, 'nome'=>null, 'erro'=>'Não foi possível salvar o arquivo.'];
    }

    return ['ok'=>true, 'nome'=>$novoNome, 'erro'=>null];
}

/** Remove arquivo seguro */
function remover_arquivo(string $dir, ?string $nome): void {
    if ($nome && is_file(rtrim($dir,'/').'/'.$nome)) {
        @unlink(rtrim($dir,'/').'/'.$nome);
    }
}
