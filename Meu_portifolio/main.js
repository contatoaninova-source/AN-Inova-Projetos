// ========== MENU MOBILE ==========
const mobileMenu = document.querySelector('.mobile-menu');
const navMenu = document.querySelector('.nav-menu');
if (mobileMenu) {
    mobileMenu.addEventListener('click', ()=>{
        navMenu.classList.toggle('active');
        mobileMenu.classList.toggle('active');
    });
}

// ========== FADE-IN ANIMATION ==========
const faders = document.querySelectorAll('.fade-in');
const appearOptions = {threshold:0, rootMargin:"0px 0px -50px 0px"};
const appearOnScroll = new IntersectionObserver((entries, observer)=>{
    entries.forEach(entry=>{
        if(!entry.isIntersecting) return;
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
    });
}, appearOptions);
faders.forEach(fader=>appearOnScroll.observe(fader));

// ========== MODALS (PROJETOS E CERTIFICADOS) ==========
const modalBg = document.getElementById('modal-bg');
const modalTitle = document.getElementById('modal-title');
const modalDescription = document.getElementById('modal-description');
const modalDetails = document.getElementById('modal-details');
const modalLink = document.getElementById('modal-link');
const modalVideo = document.getElementById('modal-video');
const modalMedia = document.getElementById('modal-media');
const modalClose = document.getElementById('modal-close');

// ========== ABRIR MODAL DE PROJETO ==========
function openProjectModal(name){
    const data = projectsData[name];
    if(!data) return;

    modalTitle.textContent = name;
    modalDescription.textContent = data.description;
    modalDetails.innerHTML = '';
    modalVideo.innerHTML = '';
    modalMedia.innerHTML = '';

    // Mostra vídeo se existir
    if(data.videoEmbed){
    modalVideo.innerHTML = `<iframe src="${data.videoEmbed}" allowfullscreen></iframe>`;
    modalVideo.style.display = 'block'; // mostra só se tiver vídeo
}

    // Mostra imagem do projeto se existir
    if(data.imagem){
        modalMedia.innerHTML = `<img src="${data.imagem}" alt="Projeto" style="max-width:100%;border-radius:10px;">`;
    }
    if(data.technologies && data.technologies.length>0){
        modalDetails.innerHTML += '<h4>Tecnologias:</h4><ul>'+data.technologies.map(t=>'<li>'+t+'</li>').join('')+'</ul>';
    }
    if(data.features && data.features.length>0){
        modalDetails.innerHTML += '<h4>Funcionalidades:</h4><ul>'+data.features.map(f=>'<li>'+f+'</li>').join('')+'</ul>';
    }

    // Botão "Ver Projeto"
    modalLink.href = data.liveUrl || '#';
    modalLink.textContent = "Ver Projeto";
    modalLink.style.display = 'inline-block';

    // Botão "Comprar Projeto"
    const btnComprar = document.getElementById('btn-comprar-projeto');
    if (btnComprar) {
        let mensagem = "Olá Antony, tudo bem? Vi o seu portfólio e me interessei pelo projeto \"" + name + "\"!\nPoderia me passar mais informações sobre como funciona a compra desse projeto?";
        if (data.imagem) {
            const protocolo = location.protocol;
            const host = location.host;
            const urlImg = protocolo + '//' + host + '/' + data.imagem.replace(/^\/+/, '');
            mensagem += "\n\nImagem do projeto: " + urlImg;
        }
        const linkWhatsapp = "https://wa.me/5511968111733?text=" + encodeURIComponent(mensagem);
        btnComprar.href = linkWhatsapp;
        btnComprar.style.display = 'inline-block';
    }

    modalBg.classList.add('active');
}

// ========== ABRIR MODAL DE CERTIFICADO ==========
function openCertificateModal(name){
    const data = certificatesData[name];
    if(!data) return;

    modalTitle.textContent = name;
    modalDescription.textContent = data.description;
    modalDetails.innerHTML = '';
    modalMedia.innerHTML = '';

    // Esconde o container de vídeo
    modalVideo.style.display = 'none';

    // Apenas IMAGEM do certificado
    if(data.media){
        modalMedia.innerHTML = `<img src="admin/${data.media}" alt="Certificado" style="max-width:100%;border-radius:10px;">`;
    }
    if(data.details && data.details.length > 0){
        modalDetails.innerHTML += '<h4>Detalhes:</h4><ul>'+data.details.map(d=>'<li>'+d+'</li>').join('')+'</ul>';
    }

    // Botão "Ver Certificado"
    modalLink.href = data.link || '#';
    modalLink.textContent = "Ver Curso";
    modalLink.style.display = data.link ? 'inline-block' : 'none';

    // Esconde botão "Comprar Projeto"
    const btnComprar = document.getElementById('btn-comprar-projeto');
    if (btnComprar) btnComprar.style.display = 'none';

    modalBg.classList.add('active');
}



// ========== FECHAR MODAL ==========
if (modalClose) {
    modalClose.addEventListener('click', ()=> modalBg.classList.remove('active'));
}
if (modalBg) {
    modalBg.addEventListener('click', e=>{
        if(e.target===modalBg) modalBg.classList.remove('active');
    });
}

// ========== BOTÕES QUE ABREM MODAL ==========
document.querySelectorAll('#projetos .project-card').forEach(card=>{
    const btn = card.querySelector('.btn-primary');
    if (btn) {
        btn.addEventListener('click', e=>{
            e.preventDefault();
            const name = card.querySelector('h3').textContent.trim();
            openProjectModal(name);
        });
    }
});

document.querySelectorAll('#certificados .project-card').forEach(card=>{
    const btn = card.querySelector('.btn-primary');
    if (btn) {
        btn.addEventListener('click', e=>{
            e.preventDefault();
            const name = card.querySelector('h3').textContent.trim();
            openCertificateModal(name);
        });
    }
});
