<!-- Modal de Agendamento -->
<div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-playfair text-2xl font-bold text-gray-800">Agendar Horário</h3>
            <button onclick="closeBookingModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="bookingForm" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Nome Completo</label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Telefone</label>
                <input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Serviço</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
                    <option value="">Selecione um serviço</option>
                    <option value="corte">Corte Feminino</option>
                    <option value="coloracao">Coloração</option>
                    <option value="manicure">Manicure</option>
                    <option value="pedicure">Pedicure</option>
                    <option value="limpeza">Limpeza de Pele</option>
                    <option value="sobrancelha">Design de Sobrancelha</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Data</label>
                    <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Horário</label>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
                        <option value="">Selecione</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                    </select>
                </div>
            </div>
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mt-4">
                <p class="text-yellow-800 text-sm">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Demo:</strong> Este é um formulário de demonstração. Em um site real, 
                    os dados seriam enviados para um sistema de agendamento.
                </p>
            </div>
            <button type="submit" class="w-full bg-pink-500 text-white py-3 rounded-lg font-semibold hover:bg-pink-600 transition duration-300">
                Confirmar Agendamento
            </button>
        </form>
    </div>
</div>