<?php
// Página Sobre Nós do Amigo Fiel PetShop
include 'includes/header.php';
?>
    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h3 class="text-4xl font-bold text-pet-dark-blue mb-8">Sobre o Amigo Fiel PetShop</h3>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="text-left">
                        <h4 class="text-2xl font-bold text-pet-orange mb-4">Nossa História</h4>
                        <p class="text-gray-700 mb-6">Fundado em 2015 por amor aos animais, o Amigo Fiel nasceu do sonho de criar um espaço onde pets e suas famílias se sentissem verdadeiramente acolhidos. Começamos pequenos, mas com um grande coração.</p>
                        <h4 class="text-2xl font-bold text-pet-orange mb-4">Nossa Missão</h4>
                        <p class="text-gray-700 mb-6">Proporcionar cuidados excepcionais para pets, tratando cada animal como membro da família, com amor, respeito e profissionalismo.</p>
                        <h4 class="text-2xl font-bold text-pet-orange mb-4">Nossos Valores</h4>
                        <ul class="text-gray-700 space-y-2">
                            <li>💝 Amor incondicional pelos animais</li>
                            <li>🤝 Confiança e transparência</li>
                            <li>⭐ Excelência no atendimento</li>
                            <li>🌱 Responsabilidade social e ambiental</li>
                        </ul>
                    </div>
                    <div class="bg-pet-blue bg-opacity-10 p-8 rounded-2xl">
                        <h4 class="text-2xl font-bold text-pet-dark-blue mb-6">Nossa Equipe</h4>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-pet-orange rounded-full flex items-center justify-center text-white font-bold">DR</div>
                                <div>
                                    <h5 class="font-bold text-pet-dark-blue">Dr. Ricardo Alves</h5>
                                    <p class="text-sm text-gray-600">Veterinário - 15 anos de experiência</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-pet-blue rounded-full flex items-center justify-center text-white font-bold">CA</div>
                                <div>
                                    <h5 class="font-bold text-pet-dark-blue">Carla Mendes</h5>
                                    <p class="text-sm text-gray-600">Tosadora Profissional</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-pet-orange rounded-full flex items-center justify-center text-white font-bold">LU</div>
                                <div>
                                    <h5 class="font-bold text-pet-dark-blue">Lucas Silva</h5>
                                    <p class="text-sm text-gray-600">Adestrador Certificado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include 'includes/modals.php';
include 'includes/footer.php';
?>
<script src="assets/scripts.js"></script>

</body>
</html>
