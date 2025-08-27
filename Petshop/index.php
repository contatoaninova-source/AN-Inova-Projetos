<?php
// Página inicial do Amigo Fiel PetShop
include 'includes/header.php';
?>

  <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap');
        body { font-family: 'Nunito', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #87CEEB 0%, #4682B4 100%); }
        .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
        .cart-count { animation: bounce 0.5s ease-in-out; }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
    </style>


    <!-- Hero Section -->
    <section id="home" class="gradient-bg text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-5xl md:text-6xl font-bold mb-6">Cuidando do seu pet como se fosse da família</h2>
                <p class="text-xl mb-8 opacity-90">Amor, carinho e profissionalismo em cada atendimento. Seu pet merece o melhor!</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="openScheduling()" class="bg-pet-orange hover:bg-orange-600 text-white px-8 py-4 rounded-full text-lg font-semibold transition-colors">
                        🛁 Agende um Banho e Tosa
                    </button>
                    <button onclick="scrollToSection('services')" class="bg-white text-pet-dark-blue hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold transition-colors">
                        Ver Serviços
                    </button>
                </div>
            </div>
            <div class="mt-16 flex justify-center space-x-8 text-6xl">
                <span class="animate-bounce">🐕</span>
                <span class="animate-bounce" style="animation-delay: 0.1s">🐱</span>
                <span class="animate-bounce" style="animation-delay: 0.2s">🐦</span>
                <span class="animate-bounce" style="animation-delay: 0.3s">🐠</span>
            </div>
        </div>
    </section>
    <!-- Preview dos Serviços -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h3 class="text-4xl font-bold text-pet-dark-blue mb-4">Nossos Serviços</h3>
                <p class="text-gray-600 text-lg">Cuidado completo para seu melhor amigo</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-pet-blue bg-opacity-10 p-8 rounded-2xl text-center card-hover">
                    <div class="text-5xl mb-4">🛁</div>
                    <h4 class="text-xl font-bold text-pet-dark-blue mb-3">Banho e Tosa</h4>
                    <p class="text-gray-600">Deixe seu pet limpinho e cheiroso com nossos profissionais especializados</p>
                </div>
                <div class="bg-pet-orange bg-opacity-10 p-8 rounded-2xl text-center card-hover">
                    <div class="text-5xl mb-4">🩺</div>
                    <h4 class="text-xl font-bold text-pet-dark-blue mb-3">Consultas Veterinárias</h4>
                    <p class="text-gray-600">Cuidados médicos com veterinários experientes e carinhosos</p>
                </div>
                <div class="bg-pet-blue bg-opacity-10 p-8 rounded-2xl text-center card-hover">
                    <div class="text-5xl mb-4">🏨</div>
                    <h4 class="text-xl font-bold text-pet-dark-blue mb-3">Hotelzinho</h4>
                    <p class="text-gray-600">Hospedagem segura e confortável para quando você precisar viajar</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Depoimentos -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h3 class="text-4xl font-bold text-pet-dark-blue mb-4">O que nossos clientes dizem</h3>
                <p class="text-gray-600 text-lg">Depoimentos de famílias felizes</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-lg card-hover">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-pet-blue rounded-full flex items-center justify-center text-2xl mr-4">🐕</div>
                        <div>
                            <h5 class="font-bold text-pet-dark-blue">Max</h5>
                            <p class="text-sm text-gray-600">Golden Retriever</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"O Max adora vir aqui! A equipe é super carinhosa e ele sempre volta feliz e cheiroso. Recomendo muito!"</p>
                    <p class="text-pet-orange font-semibold mt-3">- Maria Silva</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg card-hover">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-pet-orange bg-opacity-20 rounded-full flex items-center justify-center text-2xl mr-4">🐱</div>
                        <div>
                            <h5 class="font-bold text-pet-dark-blue">Luna</h5>
                            <p class="text-sm text-gray-600">Gata Persa</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"A Luna é muito tímida, mas aqui ela se sente segura. O atendimento é excepcional e os preços justos."</p>
                    <p class="text-pet-orange font-semibold mt-3">- João Santos</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg card-hover">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-pet-blue rounded-full flex items-center justify-center text-2xl mr-4">🐦</div>
                        <div>
                            <h5 class="font-bold text-pet-dark-blue">Piu</h5>
                            <p class="text-sm text-gray-600">Canário</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"Cuidam muito bem do Piu! Sempre com produtos de qualidade e muito amor. Virei cliente fiel!"</p>
                    <p class="text-pet-orange font-semibold mt-3">- Ana Costa</p>
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
