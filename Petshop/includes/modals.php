<?php
// Modais para agendamento e carrinho de compras
// Inclua este arquivo onde necessário, normalmente em todas páginas principais
?>
    <!-- Scheduling Modal -->
    <div id="scheduling-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-8">
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-pet-dark-blue mb-2">Agendar Serviço</h3>
                <p class="text-gray-600">Escolha o melhor horário para seu pet</p>
            </div>
            <form id="scheduling-form" class="space-y-4">
                <div>
                    <label class="block text-pet-dark-blue font-semibold mb-2">Nome do Pet</label>
                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" placeholder="Nome do seu pet" required>
                </div>
                <div>
                    <label class="block text-pet-dark-blue font-semibold mb-2">Serviço</label>
                    <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" required>
                        <option value="">Selecione o serviço</option>
                        <option value="banho">Banho e Tosa</option>
                        <option value="consulta">Consulta Veterinária</option>
                        <option value="vacina">Vacinação</option>
                        <option value="hotel">Hotelzinho</option>
                    </select>
                </div>
                <div>
                    <label class="block text-pet-dark-blue font-semibold mb-2">Data</label>
                    <input type="date" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" required>
                </div>
                <div>
                    <label class="block text-pet-dark-blue font-semibold mb-2">Horário</label>
                    <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" required>
                        <option value="">Selecione o horário</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                    </select>
                </div>
                <div>
                    <label class="block text-pet-dark-blue font-semibold mb-2">Seu Nome</label>
                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" placeholder="Seu nome completo" required>
                </div>
                <div>
                    <label class="block text-pet-dark-blue font-semibold mb-2">Telefone</label>
                    <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" placeholder="(11) 99999-9999" required>
                </div>
                <div class="flex space-x-4 pt-4">
                    <button type="button" onclick="closeScheduling()" class="flex-1 bg-gray-300 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-400 transition-colors">Cancelar</button>
                    <button type="submit" class="flex-1 bg-pet-orange text-white py-3 rounded-xl font-semibold hover:bg-orange-600 transition-colors">Agendar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Cart Modal -->
    <div id="cart-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-8 max-h-96 overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-pet-dark-blue">Carrinho de Compras</h3>
                <button onclick="toggleCart()" class="text-gray-500 hover:text-gray-700">✕</button>
            </div>
            <div id="cart-items" class="space-y-4 mb-6">
                <!-- Cart items via JS -->
            </div>
            <div class="border-t pt-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-bold text-pet-dark-blue">Total:</span>
                    <span id="cart-total" class="text-lg font-bold text-pet-orange">R$ 0,00</span>
                </div>
                <button onclick="checkout()" class="w-full bg-pet-orange text-white py-3 rounded-xl font-semibold hover:bg-orange-600 transition-colors">Finalizar Compra 🛒</button>
                <div class="mt-4 p-3 bg-pet-blue bg-opacity-10 rounded-xl">
                    <p class="text-sm text-gray-600 text-center">
                        <strong>Demo:</strong> Este é um carrinho de demonstração. Em um site real, seria integrado com um sistema de pagamento.
                    </p>
                </div>
            </div>
        </div>
    </div>