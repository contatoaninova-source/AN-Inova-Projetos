<?php
include 'includes/header.php';
?>

<!-- Menu Section -->
<section id="menu" class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Nosso Cardápio</h2>
        <div class="flex flex-wrap justify-center mb-12 space-x-4">
            <button onclick="filterMenu('all')" class="category-btn bg-orange-500 text-white px-6 py-2 rounded-full mb-2 hover:bg-orange-600 transition-colors">Todos</button>
            <button onclick="filterMenu('burgers')" class="category-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full mb-2 hover:bg-gray-300 transition-colors">Hambúrguers</button>
            <button onclick="filterMenu('pizzas')" class="category-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full mb-2 hover:bg-gray-300 transition-colors">Pizzas</button>
            <button onclick="filterMenu('drinks')" class="category-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full mb-2 hover:bg-gray-300 transition-colors">Bebidas</button>
            <button onclick="filterMenu('desserts')" class="category-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full mb-2 hover:bg-gray-300 transition-colors">Sobremesas</button>
        </div>
        <div id="menu-items" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Hambúrguers -->
            <div class="menu-item burgers bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center">
                    <span class="text-6xl">🍔</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Big Burger Clássico</h3>
                    <p class="text-gray-600 mb-4">Hambúrguer artesanal, queijo, alface, tomate e molho especial</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-orange-500">R$ 24,90</span>
                        <button onclick="addToCart('Big Burger Clássico', 24.90)" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">Adicionar</button>
                    </div>
                </div>
            </div>
            <div class="menu-item burgers bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                <div class="h-48 bg-gradient-to-br from-red-400 to-pink-500 flex items-center justify-center">
                    <span class="text-6xl">🍔</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Burger Bacon Supreme</h3>
                    <p class="text-gray-600 mb-4">Duplo hambúrguer, bacon crocante, queijo cheddar e cebola caramelizada</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-orange-500">R$ 32,90</span>
                        <button onclick="addToCart('Burger Bacon Supreme', 32.90)" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">Adicionar</button>
                    </div>
                </div>
            </div>
            <!-- Pizzas -->
            <div class="menu-item pizzas bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                <div class="h-48 bg-gradient-to-br from-green-400 to-blue-500 flex items-center justify-center">
                    <span class="text-6xl">🍕</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Pizza Margherita</h3>
                    <p class="text-gray-600 mb-4">Molho de tomate, mussarela, manjericão fresco e azeite</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-orange-500">R$ 35,90</span>
                        <button onclick="addToCart('Pizza Margherita', 35.90)" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">Adicionar</button>
                    </div>
                </div>
            </div>
            <div class="menu-item pizzas bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center">
                    <span class="text-6xl">🍕</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Pizza Pepperoni</h3>
                    <p class="text-gray-600 mb-4">Molho especial, mussarela e generosas fatias de pepperoni</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-orange-500">R$ 39,90</span>
                        <button onclick="addToCart('Pizza Pepperoni', 39.90)" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">Adicionar</button>
                    </div>
                </div>
            </div>
            <!-- Bebidas -->
            <div class="menu-item drinks bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center">
                    <span class="text-6xl">🥤</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Refrigerante Gelado</h3>
                    <p class="text-gray-600 mb-4">Coca-Cola, Pepsi ou Guaraná - 350ml</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-orange-500">R$ 5,90</span>
                        <button onclick="addToCart('Refrigerante Gelado', 5.90)" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">Adicionar</button>
                    </div>
                </div>
            </div>
            <div class="menu-item drinks bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                <div class="h-48 bg-gradient-to-br from-orange-400 to-yellow-500 flex items-center justify-center">
                    <span class="text-6xl">🧃</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Suco Natural</h3>
                    <p class="text-gray-600 mb-4">Laranja, limão ou maracujá - 400ml</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-orange-500">R$ 8,90</span>
                        <button onclick="addToCart('Suco Natural', 8.90)" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">Adicionar</button>
                    </div>
                </div>
            </div>
            <!-- Sobremesas -->
            <div class="menu-item desserts bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                <div class="h-48 bg-gradient-to-br from-pink-400 to-red-500 flex items-center justify-center">
                    <span class="text-6xl">🍰</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Brownie com Sorvete</h3>
                    <p class="text-gray-600 mb-4">Brownie de chocolate quente com sorvete de baunilha</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-orange-500">R$ 15,90</span>
                        <button onclick="addToCart('Brownie com Sorvete', 15.90)" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/cart-modal.php';
include 'includes/footer.php';
?>