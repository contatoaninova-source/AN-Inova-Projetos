// Script JS do Amigo Fiel PetShop
// Todas as funções do site original, comentadas

// Produtos disponíveis (igual ao site original)
let cart = [];
let products = [
    // Food
    { id: 1, name: 'Ração Premium Cães', price: 89.90, category: 'food', emoji: '🥘' },
    { id: 2, name: 'Ração Premium Gatos', price: 79.90, category: 'food', emoji: '🐱' },
    { id: 3, name: 'Petisco Natural', price: 24.90, category: 'food', emoji: '🦴' },
    { id: 4, name: 'Ração Filhotes', price: 69.90, category: 'food', emoji: '🍼' },
    // Toys
    { id: 5, name: 'Bola Interativa', price: 19.90, category: 'toys', emoji: '⚽' },
    { id: 6, name: 'Corda para Cães', price: 15.90, category: 'toys', emoji: '🪢' },
    { id: 7, name: 'Ratinho para Gatos', price: 12.90, category: 'toys', emoji: '🐭' },
    { id: 8, name: 'Frisbee', price: 22.90, category: 'toys', emoji: '🥏' },
    // Accessories
    { id: 9, name: 'Coleira Ajustável', price: 34.90, category: 'accessories', emoji: '🦮' },
    { id: 10, name: 'Cama Confortável', price: 89.90, category: 'accessories', emoji: '🛏️' },
    { id: 11, name: 'Bebedouro Automático', price: 45.90, category: 'accessories', emoji: '💧' },
    { id: 12, name: 'Transportadora', price: 129.90, category: 'accessories', emoji: '🧳' },
    // Medicine
    { id: 13, name: 'Vermífugo', price: 28.90, category: 'medicine', emoji: '💊' },
    { id: 14, name: 'Antipulgas', price: 39.90, category: 'medicine', emoji: '🧴' },
    { id: 15, name: 'Vitaminas', price: 49.90, category: 'medicine', emoji: '💉' },
    { id: 16, name: 'Shampoo Medicinal', price: 32.90, category: 'medicine', emoji: '🧽' }
];

// Inicializa página (produtos + carrinho)
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('products-grid')) {
        displayProducts('all');
    }
    updateCartDisplay();
});

// Menu mobile
function toggleMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}

// Navegação suave
function scrollToSection(sectionId) {
    document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
}

// Modal de agendamento
function openScheduling() {
    document.getElementById('scheduling-modal').classList.remove('hidden');
}
function closeScheduling() {
    document.getElementById('scheduling-modal').classList.add('hidden');
}

// Agendamento
if (document.getElementById('scheduling-form')) {
    document.getElementById('scheduling-form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Agendamento realizado com sucesso! Entraremos em contato para confirmar. 🐾');
        closeScheduling();
        this.reset();
    });
}

// Formulário de contato
if (document.getElementById('contact-form')) {
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Mensagem enviada com sucesso! Responderemos em breve. 💌');
        this.reset();
    });
}

// Filtro de produtos
function filterProducts(category) {
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('bg-pet-orange', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });
    event.target.classList.remove('bg-gray-200', 'text-gray-700');
    event.target.classList.add('bg-pet-orange', 'text-white');
    displayProducts(category);
}

// Exibe produtos
function displayProducts(category) {
    const grid = document.getElementById('products-grid');
    const filteredProducts = category === 'all' ? products : products.filter(p => p.category === category);
    grid.innerHTML = filteredProducts.map(product => `
        <div class="bg-white p-6 rounded-2xl shadow-lg card-hover">
            <div class="text-4xl mb-4 text-center">${product.emoji}</div>
            <h4 class="text-lg font-bold text-pet-dark-blue mb-2">${product.name}</h4>
            <p class="text-2xl font-bold text-pet-orange mb-4">R$ ${product.price.toFixed(2).replace('.', ',')}</p>
            <button onclick="addToCart(${product.id})" class="w-full bg-pet-blue hover:bg-blue-600 text-white py-2 rounded-xl font-semibold transition-colors">
                Adicionar ao Carrinho
            </button>
        </div>
    `).join('');
}

// Carrinho
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    const existingItem = cart.find(item => item.id === productId);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ ...product, quantity: 1 });
    }
    updateCartDisplay();
    // Mensagem de sucesso
    const button = event.target;
    const originalText = button.textContent;
    button.textContent = 'Adicionado! ✓';
    button.classList.add('bg-green-500');
    setTimeout(() => {
        button.textContent = originalText;
        button.classList.remove('bg-green-500');
    }, 1000);
}
function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    updateCartDisplay();
}
function updateQuantity(productId, change) {
    const item = cart.find(item => item.id === productId);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            removeFromCart(productId);
        } else {
            updateCartDisplay();
        }
    }
}
function updateCartDisplay() {
    const cartCount = document.getElementById('cart-count');
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    // Atualiza contador
    if (cartCount) {
        if (totalItems > 0) {
            cartCount.textContent = totalItems;
            cartCount.classList.remove('hidden');
        } else {
            cartCount.classList.add('hidden');
        }
    }
    // Atualiza itens do carrinho
    if (cartItems) {
        if (cart.length === 0) {
            cartItems.innerHTML = '<p class="text-gray-500 text-center py-8">Seu carrinho está vazio 🛒</p>';
        } else {
            cartItems.innerHTML = cart.map(item => `
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl">${item.emoji}</span>
                        <div>
                            <h5 class="font-semibold text-pet-dark-blue">${item.name}</h5>
                            <p class="text-pet-orange font-bold">R$ ${item.price.toFixed(2).replace('.', ',')}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="updateQuantity(${item.id}, -1)" class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center hover:bg-gray-400">-</button>
                        <span class="font-semibold px-2">${item.quantity}</span>
                        <button onclick="updateQuantity(${item.id}, 1)" class="w-8 h-8 bg-pet-blue rounded-full text-white flex items-center justify-center hover:bg-blue-600">+</button>
                        <button onclick="removeFromCart(${item.id})" class="ml-2 text-red-500 hover:text-red-700">🗑️</button>
                    </div>
                </div>
            `).join('');
        }
    }
    // Atualiza total
    if (cartTotal) {
        cartTotal.textContent = `R$ ${totalPrice.toFixed(2).replace('.', ',')}`;
    }
}
// Modal do carrinho
function toggleCart() {
    const modal = document.getElementById('cart-modal');
    modal.classList.toggle('hidden');
}
// Finalizar compra
function checkout() {
    if (cart.length === 0) {
        alert('Seu carrinho está vazio!');
        return;
    }
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    alert(`Compra finalizada! Total: R$ ${total.toFixed(2).replace('.', ',')}\n\nObrigado por escolher o Amigo Fiel PetShop! 🐾`);
    cart = [];
    updateCartDisplay();
    toggleCart();
}

// Navegação suave para links com #
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// Fecha o modal ao clicar fora
document.addEventListener('click', function(e) {
    const schedulingModal = document.getElementById('scheduling-modal');
    const cartModal = document.getElementById('cart-modal');
    if (e.target === schedulingModal) {
        closeScheduling();
    }
    if (e.target === cartModal) {
        toggleCart();
    }
});