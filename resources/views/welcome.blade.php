<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'PayDay Pag') }} - Sistema de Pagamentos</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <h1 class="text-2xl font-bold text-gray-900">PayDay Pag</h1>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                                        Entrar
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                            Registrar-se
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="flex-1 flex items-center justify-center bg-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="text-center">
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                            PayDay Pag
                        </h1>
                        <p class="text-xl text-gray-600 mb-8">
                            Sistema de Pagamentos Digital Seguro
                        </p>
                        <p class="text-lg text-gray-500 mb-12 max-w-2xl mx-auto">
                            Realize transações financeiras seguras entre usuários e comércios, utilizando carteiras digitais e múltiplos métodos de pagamento.
                        </p>

                        @auth
                            <div class="space-x-4">
                                <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Acessar Dashboard
                                </a>
                            </div>
                        @else
                            <div class="space-x-4">
                                <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Começar Agora
                                </a>
                                <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-white border border-gray-300 rounded-md font-semibold text-base text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Já tenho conta
                                </a>
                            </div>
                        @endauth
                    </div>

                    <!-- Features -->
                    <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg mb-4">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Carteiras Digitais</h3>
                            <p class="text-gray-600">
                                Controle total sobre seus saldos com carteiras digitais seguras e fáceis de usar.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg mb-4">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Transações Seguras</h3>
                            <p class="text-gray-600">
                                Registro detalhado de todas as transações com rastreabilidade completa.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg mb-4">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Múltiplos Métodos</h3>
                            <p class="text-gray-600">
                                Suporte a diversos métodos de pagamento: PIX, Cartão, Boleto e mais.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-gray-500 text-sm">
                        © {{ date('Y') }} PayDay Pag. Todos os direitos reservados.
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>
