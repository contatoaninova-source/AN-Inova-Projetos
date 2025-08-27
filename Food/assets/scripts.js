// JS principal do FoodTime Delivery
// Gerencia carrinho, filtros, modal, formulário, etc.

// Menu mobile responsivo
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
        // Fecha o menu mobile ao clicar em um link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }
    });


let cart = [];

// Adiciona item ao carrinho
function addToCart(itemName, price) {
    const existingItem = cart.find(item => item.name === itemName);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name: itemName, price: price, quantity: 1 });
    }
    updateCartDisplay();
    showCartNotification();
}

// Remove item do carrinho
function removeFromCart(itemName) {
    cart = cart.filter(item => item.name !== itemName);
    updateCartDisplay();
}

// Atualiza exibição do carrinho
function updateCartDisplay() {
    const cartCount = document.getElementById('cart-count');
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    const totalAmount = document.getElementById('total-amount');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

    if (cartCount) {
        if (totalItems > 0) {
            cartCount.textContent = totalItems;
            cartCount.classList.remove('hidden');
        } else {
            cartCount.classList.add('hidden');
        }
    }
    if (cartItems) {
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
}

// Notificação de item adicionado
function showCartNotification() {
    const notification = document.createElement('div');
    notification.className = 'fixed top-20 right-4 bg-green-500 text-white px-4 py-2 rounded-lg z-50 fade-in';
    notification.textContent = 'Item adicionado ao carrinho!';
    document.body.appendChild(notification);
    setTimeout(() => { notification.remove(); }, 2000);
}

// Filtro do cardápio
function filterMenu(category) {
    const menuItems = document.querySelectorAll('.menu-item');
    const categoryBtns = document.querySelectorAll('.category-btn');
    categoryBtns.forEach(btn => {
        btn.classList.remove('bg-orange-500', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });
    event.target.classList.remove('bg-gray-200', 'text-gray-700');
    event.target.classList.add('bg-orange-500', 'text-white');
    menuItems.forEach(item => {
        if (category === 'all' || item.classList.contains(category)) {
            item.style.display = 'block';
            item.classList.add('fade-in');
        } else {
            item.style.display = 'none';
        }
    });
}

// Modal do carrinho
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('cart-btn')) {
        document.getElementById('cart-btn').addEventListener('click', () => {
            document.getElementById('cart-modal').classList.remove('hidden');
            updateCartDisplay();
        });
    }
    if (document.getElementById('close-cart')) {
        document.getElementById('close-cart').addEventListener('click', () => {
            document.getElementById('cart-modal').classList.add('hidden');
        });
    }
    if (document.getElementById('cart-modal')) {
        document.getElementById('cart-modal').addEventListener('click', (e) => {
            if (e.target.id === 'cart-modal') {
                document.getElementById('cart-modal').classList.add('hidden');
            }
        });
    }
    // Checkout
    if (document.getElementById('checkout-btn')) {
        document.getElementById('checkout-btn').addEventListener('click', () => {
            if (cart.length === 0) return;
            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const orderSummary = cart.map(item => `${item.quantity}x ${item.name}`).join(', ');
            alert(`🎉 Pedido realizado com sucesso!\n\nItens: ${orderSummary}\nTotal: R$ ${totalPrice.toFixed(2)}\n\nTempo estimado de entrega: 30-45 minutos\nObrigado por escolher o FoodTime! 🍔`);
            cart = [];
            updateCartDisplay();
            document.getElementById('cart-modal').classList.add('hidden');
        });
    }
    // Formulário de contato
    if (document.getElementById('contact-form')) {
        document.getElementById('contact-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            alert(`✅ Mensagem enviada com sucesso!\n\nOlá ${name}, recebemos sua mensagem e entraremos em contato em breve através do email ${email}.\n\nObrigado pelo contato! 🙏`);
            document.getElementById('contact-form').reset();
        });
    }
    // Navegação suave
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});