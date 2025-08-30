<?php
require_once("conexao.php");

$query_carrossel = "SELECT * FROM carrossel";
$result_carrossel = mysqli_query($conexao, $query_carrossel);

if ($result_carrossel && mysqli_num_rows($result_carrossel) > 0): ?>
<div class="carrossel">
    <?php while($carrossel = mysqli_fetch_assoc($result_carrossel)): ?>
        <div>
            <img src="painel_admin/carrosel-upload/<?php echo htmlspecialchars($carrossel['imagem'] ?? 'padrao-carrossel.jpg'); ?>"
                 alt="<?php echo htmlspecialchars($carrossel['legenda'] ?? 'Imagem do carrossel'); ?>">
        </div>
    <?php endwhile; ?>
</div>
<?php else: ?>
<div class="carrossel">
    <div>
        <img src="imagem/padrao-carrossel.jpg" alt="Imagem padrão do carrossel" title="logo luz e vida" >
    </div>
</div>
<?php endif; ?>