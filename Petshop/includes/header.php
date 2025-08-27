<?php
// Cabeçalho do site Amigo Fiel PetShop
// Inclua este arquivo no topo de todas as páginas principais
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigo Fiel PetShop - Cuidando do seu pet como se fosse da família</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Configuração personalizada do Tailwind -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'pet-blue': '#87CEEB',
                        'pet-orange': '#FF8C42',
                        'pet-dark-blue': '#4682B4'
                    },
                    fontFamily: {
                        'rounded': ['ui-rounded', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <!-- Fonte Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS customizado -->
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body class="bg-gray-50">
    <!-- Header / Menu de Navegação -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-pet-blue rounded-full flex items-center justify-center">
                        <span class="text-2xl">🐾</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-pet-dark-blue">Amigo Fiel</h1>
                        <p class="text-sm text-gray-600">PetShop</p>
                    </div>
                </div>
                <!-- Navegação principal -->
                <nav class="hidden md:flex space-x-8">
                    <a href="index.php" class="text-gray-700 hover:text-pet-orange font-medium transition-colors">Início</a>
                    <a href="sobre.php" class="text-gray-700 hover:text-pet-orange font-medium transition-colors">Sobre Nós</a>
                    <a href="servicos.php" class="text-gray-700 hover:text-pet-orange font-medium transition-colors">Serviços</a>
                    <a href="produtos.php" class="text-gray-700 hover:text-pet-orange font-medium transition-colors">Produtos</a>
                    <a href="contato.php" class="text-gray-700 hover:text-pet-orange font-medium transition-colors">Contato</a>
                </nav>
                <!-- Botões de carrinho/menu mobile -->
                <div class="flex items-center space-x-4">
                    <button onclick="toggleCart()" class="relative bg-pet-orange text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-colors">
                        🛒 Carrinho
                        <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center cart-count hidden">0</span>
                    </button>
                    <button onclick="toggleMenu()" class="md:hidden text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Menu Mobile -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="/index.php" class="text-gray-700 hover:text-pet-orange font-medium">Início</a>
                    <a href="/sobre.php" class="text-gray-700 hover:text-pet-orange font-medium">Sobre Nós</a>
                    <a href="/servicos.php" class="text-gray-700 hover:text-pet-orange font-medium">Serviços</a>
                    <a href="/produtos.php" class="text-gray-700 hover:text-pet-orange font-medium">Produtos</a>
                    <a href="/contato.php" class="text-gray-700 hover:text-pet-orange font-medium">Contato</a>
                </div>
            </div>
        </div>
    </header>