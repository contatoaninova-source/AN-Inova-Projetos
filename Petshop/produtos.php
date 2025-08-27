<?php
// Página Produtos do Amigo Fiel PetShop
include 'includes/header.php';
?>
    <!-- Products Section -->
    <section id="products" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h3 class="text-4xl font-bold text-pet-dark-blue mb-4">Nossos Produtos</h3>
                <p class="text-gray-600 text-lg">Tudo que seu pet precisa em um só lugar</p>
            </div>
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <button onclick="filterProducts('all')" class="filter-btn bg-pet-orange text-white px-6 py-2 rounded-full font-semibold">Todos</button>
                <button onclick="filterProducts('food')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full font-semibold hover:bg-pet-blue hover:text-white transition-colors">Ração</button>
                <button onclick="filterProducts('toys')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full font-semibold hover:bg-pet-blue hover:text-white transition-colors">Brinquedos</button>
                <button onclick="filterProducts('accessories')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full font-semibold hover:bg-pet-blue hover:text-white transition-colors">Acessórios</button>
                <button onclick="filterProducts('medicine')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full font-semibold hover:bg-pet-blue hover:text-white transition-colors">Medicamentos</button>
            </div>
            <div id="products-grid" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Produtos via JS -->
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