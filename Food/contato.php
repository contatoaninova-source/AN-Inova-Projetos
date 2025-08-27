<?php
include 'includes/header.php';
?>

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

<?php
include 'includes/footer.php';
?>