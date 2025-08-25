<!-- Modal -->
<div class="modal-bg" id="modal-bg">
    <div class="modal-content">
        <span class="modal-close" id="modal-close">&times;</span>
        <h2 id="modal-title"></h2>
        <div id="modal-video" class="video-container"></div>
        <div id="modal-media"></div>
        <p id="modal-description"></p>
        <div id="modal-details"></div>
        <a href="#" id="modal-link" class="btn btn-primary" target="_blank">Ver Projeto</a>

        <!-- Botão Comprar Projeto – só aparece para projetos (opcional: coloque display:none e mostra via JS) -->
        <a href="#" id="btn-comprar-projeto" class="btn" style="background:#25D366; margin-top:18px; display:none;" target="_blank">
            <i class="fab fa-whatsapp"></i> Comprar Projeto
        </a>
    </div>
</div>


<style>
.modal-description {
    max-width: 500px;      /* largura máxima */
    width: 50%;           /* ocupa 100% do contêiner até o máximo */
    white-space: normal;   /* permite quebrar linhas */
    word-wrap: break-word; /* quebra palavras longas */
    overflow-wrap: break-word; /* compatibilidade adicional */
    line-height: 1.5;  /* deixa o texto mais legível */
    overflow-x: hidden; /* oculta o transbordo horizontal */
}
</style>