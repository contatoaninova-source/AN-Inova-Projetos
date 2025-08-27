<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodTime Delivery - Sabor na Hora Certa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .cart-badge {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-xl">🍔</span>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">FoodTime</h1>
                </div>
                
                <nav class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-orange-500 transition-colors">Início</a>
                    <a href="#menu" class="text-gray-700 hover:text-orange-500 transition-colors">Cardápio</a>
                    <a href="#about" class="text-gray-700 hover:text-orange-500 transition-colors">Sobre</a>
                    <a href="#contact" class="text-gray-700 hover:text-orange-500 transition-colors">Contato</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <button id="cart-btn" class="relative bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">
                        🛒 Carrinho
                        <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center cart-badge hidden">0</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-5xl font-bold mb-6">Sabor na Hora Certa! 🍕</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Delivery rápido e saboroso direto na sua casa. Os melhores pratos da cidade com qualidade garantida!</p>
            <button onclick="document.getElementById('menu').scrollIntoView({behavior: 'smooth'})" class="bg-white text-orange-500 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-colors">
                Ver Cardápio 🍽️
            </button>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Nosso Cardápio</h2>
            
            <!-- Category Filter -->
            <div class="flex flex-wrap justify-center mb-12 space-x-4">
                <button onclick="filterMenu('all')" class="category-btn bg-orange-500 text-white px-6 py-2 rounded-full mb-2 hover:bg-orange-600 transition-colors">Todos</button>
                <button onclick="filterMenu('burgers')" class="category-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full mb-2 hover:bg-gray-300 transition-colors">Hambúrguers</button>
                <button onclick="filterMenu('pizzas')" class="category-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full mb-2 hover:bg-gray-300 transition-colors">Pizzas</button>
                <button onclick="filterMenu('drinks')" class="category-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full mb-2 hover:bg-gray-300 transition-colors">Bebidas</button>
                <button onclick="filterMenu('desserts')" class="category-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full mb-2 hover:bg-gray-300 transition-colors">Sobremesas</button>
            </div>
            
            <!-- Menu Items -->
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

    <!-- About Section -->
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

    <!-- Contact Section -->
    <section id="contact" class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Entre em Contato</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-2xl font-semibold mb-6">Fale Conosco</h3>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">📱</span>
                                <span class="text-lg">(11) 99999-9999</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">📧</span>
                                <span class="text-lg">contato@foodtime.com.br</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">📍</span>
                                <span class="text-lg">Rua das Delícias, 123 - São Paulo, SP</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">🕒</span>
                                <span class="text-lg">Seg-Dom: 18h às 23h</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <form id="contact-form" class="space-y-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Nome</label>
                                <input type="text" id="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                                <input type="email" id="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Mensagem</label>
                                <textarea id="message" required rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                                Enviar Mensagem
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Modal -->
    <div id="cart-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg max-w-md w-full max-h-96 overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Seu Carrinho</h3>
                    <button id="close-cart" class="text-gray-500 hover:text-gray-700">✕</button>
                </div>
                <div id="cart-items" class="space-y-3 mb-6">
                    <p class="text-gray-500 text-center py-8">Seu carrinho está vazio</p>
                </div>
                <div id="cart-total" class="border-t pt-4 hidden">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Total:</span>
                        <span id="total-amount" class="text-xl font-bold text-orange-500">R$ 0,00</span>
                    </div>
                    <button id="checkout-btn" class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                        Finalizar Pedido
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <div class="flex items-center justify-center space-x-2 mb-4">
                <div class="w-8 h-8 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold">🍔</span>
                </div>
                <h3 class="text-xl font-bold">FoodTime Delivery</h3>
            </div>
            <p class="text-gray-400 mb-4">Sabor na hora certa, sempre!</p>
            <p class="text-sm text-gray-500">© 2024 FoodTime Delivery. Projeto de portfólio - Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        // Cart functionality
        let cart = [];
        let cartTotal = 0;

        function addToCart(itemName, price) {
            const existingItem = cart.find(item => item.name === itemName);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    name: itemName,
                    price: price,
                    quantity: 1
                });
            }
            
            updateCartDisplay();
            showCartNotification();
        }

        function removeFromCart(itemName) {
            cart = cart.filter(item => item.name !== itemName);
            updateCartDisplay();
        }

        function updateCartDisplay() {
            const cartCount = document.getElementById('cart-count');
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            const totalAmount = document.getElementById('total-amount');
            
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            
            if (totalItems > 0) {
                cartCount.textContent = totalItems;
                cartCount.classList.remove('hidden');
            } else {
                cartCount.classList.add('hidden');
            }
            
            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="text-gray-500 text-center py-8">Seu carrinho está vazio</p>';
                cartTotal.classList.add('hidden');
            } else {
                cartItems.innerHTML = cart.map(item => `
                    <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                        <div>
                            <h4 class="font-semibold">${item.name}</h4>
                            <p class="text-sm text-gray-600">Qtd: ${item.quantity} x R$ ${item.price.toFixed(2)}</p>
                        </div>
                        <button onclick="removeFromCart('${item.name}')" class="text-red-500 hover:text-red-700">🗑️</button>
                    </div>
                `).join('');
                cartTotal.classList.remove('hidden');
                totalAmount.textContent = `R$ ${totalPrice.toFixed(2)}`;
            }
        }

        function showCartNotification() {
            const notification = document.createElement('div');
            notification.className = 'fixed top-20 right-4 bg-green-500 text-white px-4 py-2 rounded-lg z-50 fade-in';
            notification.textContent = 'Item adicionado ao carrinho!';
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 2000);
        }

        // Menu filter functionality
        function filterMenu(category) {
            const menuItems = document.querySelectorAll('.menu-item');
            const categoryBtns = document.querySelectorAll('.category-btn');
            
            // Update button styles
            categoryBtns.forEach(btn => {
                btn.classList.remove('bg-orange-500', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            
            event.target.classList.remove('bg-gray-200', 'text-gray-700');
            event.target.classList.add('bg-orange-500', 'text-white');
            
            // Filter items
            menuItems.forEach(item => {
                if (category === 'all' || item.classList.contains(category)) {
                    item.style.display = 'block';
                    item.classList.add('fade-in');
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Modal functionality
        document.getElementById('cart-btn').addEventListener('click', () => {
            document.getElementById('cart-modal').classList.remove('hidden');
        });

        document.getElementById('close-cart').addEventListener('click', () => {
            document.getElementById('cart-modal').classList.add('hidden');
        });

        document.getElementById('cart-modal').addEventListener('click', (e) => {
            if (e.target.id === 'cart-modal') {
                document.getElementById('cart-modal').classList.add('hidden');
            }
        });

        // Checkout functionality
        document.getElementById('checkout-btn').addEventListener('click', () => {
            if (cart.length === 0) return;
            
            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const orderSummary = cart.map(item => `${item.quantity}x ${item.name}`).join(', ');
            
            alert(`🎉 Pedido realizado com sucesso!\n\nItens: ${orderSummary}\nTotal: R$ ${totalPrice.toFixed(2)}\n\nTempo estimado de entrega: 30-45 minutos\nObrigado por escolher o FoodTime! 🍔`);
            
            // Clear cart
            cart = [];
            updateCartDisplay();
            document.getElementById('cart-modal').classList.add('hidden');
        });

        // Contact form functionality
        document.getElementById('contact-form').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            
            // Simulate form submission
            alert(`✅ Mensagem enviada com sucesso!\n\nOlá ${name}, recebemos sua mensagem e entraremos em contato em breve através do email ${email}.\n\nObrigado pelo contato! 🙏`);
            
            // Reset form
            document.getElementById('contact-form').reset();
        });

        // Smooth scrolling for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'975dae15009adb90',t:'MTc1NjMxOTg0NC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
