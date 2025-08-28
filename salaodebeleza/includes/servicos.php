<!-- Serviços -->
<section id="servicos" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="font-playfair text-4xl font-bold text-gray-800 mb-4">Nossos Serviços</h2>
            <p class="text-xl text-gray-600">Cuidados completos para realçar sua beleza natural</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Cabelo -->
            <div class="service-card rounded-2xl p-6 shadow-lg card-hover">
                <div class="w-16 h-16 bg-pink-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-cut text-white text-xl"></i>
                </div>
                <h3 class="font-playfair text-xl font-semibold text-gray-800 mb-3">Cabelo</h3>
                <ul class="space-y-2 text-gray-600 mb-4">
                    <li class="flex justify-between"><span>Corte Feminino</span><span class="font-semibold">R$ 80</span></li>
                    <li class="flex justify-between"><span>Coloração</span><span class="font-semibold">R$ 120</span></li>
                    <li class="flex justify-between"><span>Mechas</span><span class="font-semibold">R$ 150</span></li>
                    <li class="flex justify-between"><span>Escova</span><span class="font-semibold">R$ 45</span></li>
                    <li class="flex justify-between"><span>Hidratação</span><span class="font-semibold">R$ 60</span></li>
                </ul>
                <button onclick="openBookingModal()" class="w-full bg-pink-500 text-white py-2 rounded-full hover:bg-pink-600 transition duration-300">
                    Agendar
                </button>
            </div>
            <!-- Estética -->
            <div class="service-card rounded-2xl p-6 shadow-lg card-hover">
                <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-spa text-white text-xl"></i>
                </div>
                <h3 class="font-playfair text-xl font-semibold text-gray-800 mb-3">Estética</h3>
                <ul class="space-y-2 text-gray-600 mb-4">
                    <li class="flex justify-between"><span>Limpeza de Pele</span><span class="font-semibold">R$ 90</span></li>
                    <li class="flex justify-between"><span>Peeling</span><span class="font-semibold">R$ 120</span></li>
                    <li class="flex justify-between"><span>Hidratação Facial</span><span class="font-semibold">R$ 80</span></li>
                    <li class="flex justify-between"><span>Massagem Relaxante</span><span class="font-semibold">R$ 100</span></li>
                    <li class="flex justify-between"><span>Drenagem Linfática</span><span class="font-semibold">R$ 110</span></li>
                </ul>
                <button onclick="openBookingModal()" class="w-full bg-yellow-500 text-white py-2 rounded-full hover:bg-yellow-600 transition duration-300">
                    Agendar
                </button>
            </div>
            <!-- Unhas -->
            <div class="service-card rounded-2xl p-6 shadow-lg card-hover">
                <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-hand-sparkles text-white text-xl"></i>
                </div>
                <h3 class="font-playfair text-xl font-semibold text-gray-800 mb-3">Unhas</h3>
                <ul class="space-y-2 text-gray-600 mb-4">
                    <li class="flex justify-between"><span>Manicure</span><span class="font-semibold">R$ 35</span></li>
                    <li class="flex justify-between"><span>Pedicure</span><span class="font-semibold">R$ 40</span></li>
                    <li class="flex justify-between"><span>Unha em Gel</span><span class="font-semibold">R$ 60</span></li>
                    <li class="flex justify-between"><span>Nail Art</span><span class="font-semibold">R$ 80</span></li>
                    <li class="flex justify-between"><span>Alongamento</span><span class="font-semibold">R$ 100</span></li>
                </ul>
                <button onclick="openBookingModal()" class="w-full bg-purple-500 text-white py-2 rounded-full hover:bg-purple-600 transition duration-300">
                    Agendar
                </button>
            </div>
            <!-- Sobrancelhas -->
            <div class="service-card rounded-2xl p-6 shadow-lg card-hover">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-eye text-white text-xl"></i>
                </div>
                <h3 class="font-playfair text-xl font-semibold text-gray-800 mb-3">Sobrancelhas</h3>
                <ul class="space-y-2 text-gray-600 mb-4">
                    <li class="flex justify-between"><span>Design de Sobrancelha</span><span class="font-semibold">R$ 45</span></li>
                    <li class="flex justify-between"><span>Henna</span><span class="font-semibold">R$ 35</span></li>
                    <li class="flex justify-between"><span>Micropigmentação</span><span class="font-semibold">R$ 300</span></li>
                    <li class="flex justify-between"><span>Retoque</span><span class="font-semibold">R$ 100</span></li>
                </ul>
                <button onclick="openBookingModal()" class="w-full bg-green-500 text-white py-2 rounded-full hover:bg-green-600 transition duration-300">
                    Agendar
                </button>
            </div>
            <!-- Depilação -->
            <div class="service-card rounded-2xl p-6 shadow-lg card-hover">
                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-leaf text-white text-xl"></i>
                </div>
                <h3 class="font-playfair text-xl font-semibold text-gray-800 mb-3">Depilação</h3>
                <ul class="space-y-2 text-gray-600 mb-4">
                    <li class="flex justify-between"><span>Pernas Completas</span><span class="font-semibold">R$ 60</span></li>
                    <li class="flex justify-between"><span>Axilas</span><span class="font-semibold">R$ 25</span></li>
                    <li class="flex justify-between"><span>Virilha</span><span class="font-semibold">R$ 35</span></li>
                    <li class="flex justify-between"><span>Buço</span><span class="font-semibold">R$ 15</span></li>
                </ul>
                <button onclick="openBookingModal()" class="w-full bg-blue-500 text-white py-2 rounded-full hover:bg-blue-600 transition duration-300">
                    Agendar
                </button>
            </div>
            <!-- Pacotes -->
            <div class="service-card rounded-2xl p-6 shadow-lg card-hover border-2 border-pink-300">
                <div class="w-16 h-16 bg-pink-600 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-gift text-white text-xl"></i>
                </div>
                <h3 class="font-playfair text-xl font-semibold text-gray-800 mb-3">Pacotes Especiais</h3>
                <ul class="space-y-2 text-gray-600 mb-4">
                    <li class="flex justify-between"><span>Dia da Noiva</span><span class="font-semibold">R$ 350</span></li>
                    <li class="flex justify-between"><span>Pacote Relax</span><span class="font-semibold">R$ 200</span></li>
                    <li class="flex justify-between"><span>Combo Mãos e Pés</span><span class="font-semibold">R$ 65</span></li>
                    <li class="flex justify-between"><span>Day Spa</span><span class="font-semibold">R$ 280</span></li>
                </ul>
                <button onclick="openBookingModal()" class="w-full bg-pink-600 text-white py-2 rounded-full hover:bg-pink-700 transition duration-300">
                    Agendar
                </button>
            </div>
        </div>
    </div>
</section>