<?php
// Cabeçalho do FoodTime Delivery com menu mobile responsivo
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodTime Delivery - Sabor na Hora Certa</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonte Poppins + CSS extra -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="bg-gray-50">
    <!-- Header / Menu -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-xl">🍔</span>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">FoodTime</h1>
                </div>
                <!-- Navegação principal desktop -->
                <nav class="hidden md:flex space-x-8">
                    <a href="index.php" class="text-gray-700 hover:text-orange-500 transition-colors">Início</a>
                    <a href="cardapio.php" class="text-gray-700 hover:text-orange-500 transition-colors">Cardápio</a>
                    <a href="sobre.php" class="text-gray-700 hover:text-orange-500 transition-colors">Sobre</a>
                    <a href="contato.php" class="text-gray-700 hover:text-orange-500 transition-colors">Contato</a>
                </nav>
                <!-- Botão de menu mobile -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-700 focus:outline-none" aria-label="Abrir menu">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 8h16M4 16h16"></path>
                    </svg>
                </button>
                <div class="flex items-center space-x-4">
                    <button id="cart-btn" class="relative bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">
                        🛒 Carrinho
                        <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center cart-badge hidden">0</span>
                    </button>
                </div>
            </div>
            <!-- Menu mobile -->
            <nav id="mobile-menu" class="md:hidden hidden flex-col space-y-3 mt-4 pb-4 bg-white rounded-xl shadow-xl">
                <a href="index.php" class="block text-gray-700 hover:text-orange-500 font-medium px-4 py-2">Início</a>
                <a href="cardapio.php" class="block text-gray-700 hover:text-orange-500 font-medium px-4 py-2">Cardápio</a>
                <a href="sobre.php" class="block text-gray-700 hover:text-orange-500 font-medium px-4 py-2">Sobre</a>
                <a href="contato.php" class="block text-gray-700 hover:text-orange-500 font-medium px-4 py-2">Contato</a>
            </nav>
        </div>
    </header>