<?php
// Página Contato do Amigo Fiel PetShop
include 'includes/header.php';
?>
    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h3 class="text-4xl font-bold text-pet-dark-blue mb-4">Entre em Contato</h3>
                <p class="text-gray-600 text-lg">Estamos aqui para ajudar você e seu pet</p>
            </div>
            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg">
                        <h4 class="text-2xl font-bold text-pet-dark-blue mb-6">Informações de Contato</h4>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-pet-blue rounded-full flex items-center justify-center">📞</div>
                                <div>
                                    <p class="font-semibold text-pet-dark-blue">Telefone</p>
                                    <p class="text-gray-600">(11) 3456-7890</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-pet-orange bg-opacity-20 rounded-full flex items-center justify-center">📱</div>
                                <div>
                                    <p class="font-semibold text-pet-dark-blue">WhatsApp</p>
                                    <p class="text-gray-600">(11) 99876-5432</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-pet-blue rounded-full flex items-center justify-center">📍</div>
                                <div>
                                    <p class="font-semibold text-pet-dark-blue">Endereço</p>
                                    <p class="text-gray-600">Rua dos Pets, 123 - Vila Animal<br>São Paulo, SP - CEP: 01234-567</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-pet-orange bg-opacity-20 rounded-full flex items-center justify-center">🕒</div>
                                <div>
                                    <p class="font-semibold text-pet-dark-blue">Horário de Funcionamento</p>
                                    <p class="text-gray-600">Segunda a Sexta: 8h às 18h<br>Sábado: 8h às 16h<br>Domingo: 9h às 14h</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h5 class="font-bold text-pet-dark-blue mb-4">Localização</h5>
                            <div class="bg-pet-blue bg-opacity-10 p-6 rounded-xl text-center">
                                <div class="text-4xl mb-2">🗺️</div>
                                <p class="text-gray-600">Mapa integrado disponível</p>
                                <p class="text-sm text-gray-500 mt-2">Estamos localizados no coração da Vila Animal</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg">
                        <h4 class="text-2xl font-bold text-pet-dark-blue mb-6">Envie uma Mensagem</h4>
                        <form id="contact-form" class="space-y-6">
                            <div>
                                <label class="block text-pet-dark-blue font-semibold mb-2">Nome Completo</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" placeholder="Seu nome completo" required>
                            </div>
                            <div>
                                <label class="block text-pet-dark-blue font-semibold mb-2">E-mail</label>
                                <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" placeholder="seu@email.com" required>
                            </div>
                            <div>
                                <label class="block text-pet-dark-blue font-semibold mb-2">Telefone</label>
                                <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" placeholder="(11) 99999-9999">
                            </div>
                            <div>
                                <label class="block text-pet-dark-blue font-semibold mb-2">Nome do Pet</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" placeholder="Nome do seu pet">
                            </div>
                            <div>
                                <label class="block text-pet-dark-blue font-semibold mb-2">Mensagem</label>
                                <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-pet-blue" placeholder="Como podemos ajudar você e seu pet?" required></textarea>
                            </div>
                            <button type="submit" class="w-full bg-pet-orange hover:bg-orange-600 text-white py-3 rounded-xl font-semibold transition-colors">Enviar Mensagem 💌</button>
                        </form>
                        <div class="mt-6 p-4 bg-pet-blue bg-opacity-10 rounded-xl">
                            <p class="text-sm text-gray-600 text-center">
                                <strong>Demo:</strong> Este é um formulário de demonstração. Em um site real, as mensagens seriam enviadas para o e-mail do petshop.
                            </p>
                        </div>
                    </div>
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
