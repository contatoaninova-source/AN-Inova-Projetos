<!-- WhatsApp Float Button -->
<a href="https://wa.me/5511999999999" target="_blank" class="whatsapp-float">
    <i class="fab fa-whatsapp mt-4"></i>
</a>

<!-- Navigation -->
<nav class="bg-white shadow-lg fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <h1 class="font-playfair text-2xl font-bold text-pink-600">Bella Essence</h1>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="index.php" class="text-gray-700 hover:text-pink-600 transition duration-300">Home</a>
                <a href="index.php#sobre" class="text-gray-700 hover:text-pink-600 transition duration-300">Sobre</a>
                <a href="servicos.php" class="text-gray-700 hover:text-pink-600 transition duration-300">Serviços</a>
                <a href="galeria.php" class="text-gray-700 hover:text-pink-600 transition duration-300">Galeria</a>
                <a href="depoimentos.php" class="text-gray-700 hover:text-pink-600 transition duration-300">Depoimentos</a>
                <a href="index.php#contato" class="text-gray-700 hover:text-pink-600 transition duration-300">Contato</a>
                <button onclick="openBookingModal()" class="bg-pink-500 text-white px-6 py-2 rounded-full hover:bg-pink-600 transition duration-300">
                    Agendar
                </button>
            </div>
            <div class="md:hidden flex items-center">
                <button onclick="toggleMobileMenu()" class="text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="index.php" class="block px-3 py-2 text-gray-700">Home</a>
            <a href="index.php#sobre" class="block px-3 py-2 text-gray-700">Sobre</a>
            <a href="servicos.php" class="block px-3 py-2 text-gray-700">Serviços</a>
            <a href="galeria.php" class="block px-3 py-2 text-gray-700">Galeria</a>
            <a href="depoimentos.php" class="block px-3 py-2 text-gray-700">Depoimentos</a>
            <a href="index.php#contato" class="block px-3 py-2 text-gray-700">Contato</a>
            <button onclick="openBookingModal()" class="block w-full text-left px-3 py-2 bg-pink-500 text-white rounded">
                Agendar
            </button>
        </div>
    </div>
</nav>