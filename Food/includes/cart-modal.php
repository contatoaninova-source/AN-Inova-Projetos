<?php
// Modal do carrinho para FoodTime Delivery
// Inclua este arquivo nas páginas com carrinho
?>
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