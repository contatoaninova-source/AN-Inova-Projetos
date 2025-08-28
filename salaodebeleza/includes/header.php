<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bella Essence - Salão de Beleza</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');
        :root {
            --primary-pink: #f8b4cb;
            --secondary-pink: #f4a6cd;
            --gold: #d4af37;
            --light-gold: #f4e4bc;
            --soft-cream: #faf8f5;
            --warm-gray: #8b7355;
        }
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #faf8f5 0%, #f8b4cb 100%);}
        .gold-gradient { background: linear-gradient(135deg, #d4af37 0%, #f4e4bc 100%);}
        .card-hover { transition: all 0.3s ease;}
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(248,180,203,0.3);}
        .whatsapp-float { position: fixed; width: 60px; height: 60px; bottom: 40px; right: 40px; background-color: #25d366; color: #FFF; border-radius: 50px; text-align: center; font-size: 30px; box-shadow: 2px 2px 3px #999; z-index: 100; animation: pulse 2s infinite;}
        @keyframes pulse { 0%{transform:scale(1);} 50%{transform:scale(1.1);} 100%{transform:scale(1);} }
        .service-card { background: linear-gradient(145deg, #ffffff 0%, #faf8f5 100%); border: 1px solid rgba(248,180,203,0.2);}
        .gallery-item { transition: transform 0.3s ease;}
        .gallery-item:hover { transform: scale(1.05);}
    </style>
</head>
<body class="font-inter bg-gray-50">