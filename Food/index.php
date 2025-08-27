<?php
include 'includes/header.php';
?>

<!-- Hero Section -->
<section id="home" class="hero-gradient text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-5xl font-bold mb-6">Sabor na Hora Certa! 🍕</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Delivery rápido e saboroso direto na sua casa. Os melhores pratos da cidade com qualidade garantida!</p>
        <a href="cardapio.php" class="bg-white text-orange-500 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-colors inline-block">
            Ver Cardápio 🍽️
        </a>
    </div>
</section>

<!-- Sobre e Destaques -->
<section id="about" class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-8">Sobre o FoodTime</h2>
            <p class="text-lg text-gray-600 mb-8">
                Somos apaixonados por comida de qualidade e atendimento excepcional. Desde 2020, o FoodTime Delivery 
                tem sido a escolha número 1 para quem busca sabor, rapidez e conveniência na hora de pedir comida.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">⚡</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Entrega Rápida</h3>
                    <p class="text-gray-600">Entregamos em até 30 minutos na sua região</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🏆</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Qualidade Premium</h3>
                    <p class="text-gray-600">Ingredientes frescos e selecionados</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">💝</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Atendimento 5 Estrelas</h3>
                    <p class="text-gray-600">Suporte dedicado e personalizado</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/cart-modal.php';
include 'includes/footer.php';
?>