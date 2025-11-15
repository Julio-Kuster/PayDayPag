<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PayDay Pag - Sistema de Pagamentos</title>
    
            @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white/90 backdrop-blur-md border-b-2 border-blue-600 shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center space-x-3">
                        <div class="bg-gradient-to-br from-blue-600 to-blue-700 p-2 rounded-lg shadow-md">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                            PayDay Pag
                        </h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 rounded-lg transition">
                                    Dashboard
                                </a>
        @else
                                <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 rounded-lg transition">
                                    Entrar
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition shadow-lg hover:shadow-xl font-semibold">
                                        Cadastrar
                                    </a>
                                @endif
                            @endauth
        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                    Sistema de Pagamentos
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                        Digital Seguro
                    </span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto">
                    Realize transações financeiras seguras entre usuários e comércios, utilizando carteiras digitais e múltiplos métodos de pagamento.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:from-blue-700 hover:to-blue-800 transition shadow-xl transform hover:scale-105">
                            Acessar Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:from-blue-700 hover:to-blue-800 transition shadow-xl transform hover:scale-105">
                            Começar Agora
                        </a>
                        <a href="{{ route('login') }}" class="bg-white text-gray-900 border-2 border-blue-300 px-8 py-4 rounded-lg text-lg font-semibold hover:border-blue-600 hover:bg-blue-50 transition">
                            Já tenho conta
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Features Grid -->
            <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl mb-4">💼</div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Carteiras Digitais</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Controle total sobre seus saldos com carteiras digitais seguras e fáceis de usar.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl mb-4">🔒</div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Transações Seguras</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Registro detalhado de todas as transações com rastreabilidade completa.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl mb-4">💳</div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Múltiplos Métodos</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Suporte a diversos métodos de pagamento: PIX, Cartão, Boleto e mais.
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="text-center">
                    <p class="text-gray-400">
                        © {{ date('Y') }} PayDay Pag. Desenvolvido por Júlio Cesar Guzzo Küster, Felipe Queiroz Hyczy, Andrew Bertelli, Josué de Castilho.
                    </p>
                </div>
            </div>
        </footer>
    </div>
    </body>
</html>
