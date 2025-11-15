<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <p class="text-sm text-gray-600 mt-1">Bem-vindo de volta, {{ Auth::user()->name }}!</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensagens de Sucesso/Erro -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Cards de Estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Saldo da Carteira -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Saldo Disponível</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">
                                    R$ {{ number_format(optional(Auth::user()->carteira)->saldo ?? 0.00, 2, ',', '.') }}
                                </p>
                            </div>
                            <div class="bg-gray-100 rounded-full p-3">
                                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <a href="{{ route('carteira.index') }}" class="mt-4 inline-block text-sm text-indigo-600 hover:text-indigo-900">
                            Gerenciar Carteira →
                        </a>
                    </div>
                </div>

                <!-- Total de Transações -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total de Transações</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">
                                    {{ (Auth::user()->transacoesComoPagador()->count() ?? 0) + (Auth::user()->transacoesComoBeneficiario()->count() ?? 0) }}
                                </p>
                            </div>
                            <div class="bg-gray-100 rounded-full p-3">
                                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                        </div>
                        <a href="{{ route('transacoes.index') }}" class="mt-4 inline-block text-sm text-indigo-600 hover:text-indigo-900">
                            Ver Histórico →
                        </a>
                    </div>
                </div>

                <!-- Status do Comércio -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Status do Comércio</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">
                                    {{ Auth::user()->comercio ? 'Ativo' : 'Inativo' }}
                                </p>
                            </div>
                            <div class="bg-gray-100 rounded-full p-3">
                                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                        <a href="{{ route('comercio.index') }}" class="mt-4 inline-block text-sm text-indigo-600 hover:text-indigo-900">
                            {{ Auth::user()->comercio ? 'Ver Comércio →' : 'Cadastrar Comércio →' }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Ações Rápidas -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Ações Rápidas</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{ route('transacoes.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Nova Transação</p>
                                <p class="text-sm text-gray-600">Enviar pagamento</p>
                            </div>
                        </a>

                        <a href="{{ route('carteira.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Depositar</p>
                                <p class="text-sm text-gray-600">Adicionar saldo</p>
                            </div>
                        </a>

                        <a href="{{ route('transacoes.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Histórico</p>
                                <p class="text-sm text-gray-600">Ver transações</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Transações Recentes -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Transações Recentes</h3>
                    @php
                        $transacoesPagador = Auth::user()->transacoesComoPagador()->with(['beneficiario', 'metodoPagamento'])->orderBy('created_at', 'desc')->take(5)->get();
                        $transacoesBeneficiario = Auth::user()->transacoesComoBeneficiario()->with(['pagador', 'metodoPagamento'])->orderBy('created_at', 'desc')->take(5)->get();
                        $transacoes = $transacoesPagador->merge($transacoesBeneficiario)->sortByDesc('created_at')->take(5);
                    @endphp
                    @if($transacoes->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuário</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Método</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($transacoes as $transacao)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if($transacao->pagador_id == Auth::id())
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Enviado
                                                    </span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Recebido
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                @if($transacao->pagador_id == Auth::id())
                                                    {{ $transacao->beneficiario->name }}
                                                @else
                                                    {{ $transacao->pagador->name }}
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $transacao->metodoPagamento->nome }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium 
                                                @if($transacao->pagador_id == Auth::id()) text-red-600 @else text-green-600 @endif">
                                                @if($transacao->pagador_id == Auth::id())-@endif
                                                R$ {{ number_format($transacao->valor, 2, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    @if($transacao->status == 'concluido') bg-green-100 text-green-800
                                                    @elseif($transacao->status == 'pendente') bg-yellow-100 text-yellow-800
                                                    @else bg-red-100 text-red-800
                                                    @endif">
                                                    {{ ucfirst($transacao->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $transacao->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('transacoes.show', $transacao) }}" class="text-indigo-600 hover:text-indigo-900">Ver detalhes</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="{{ route('transacoes.index') }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                Ver todas as transações →
                            </a>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="mt-4 text-sm text-gray-500">Nenhuma transação encontrada</p>
                            <p class="mt-2 text-sm text-gray-400">Comece fazendo sua primeira transação</p>
                            <div class="mt-6">
                                <a href="{{ route('transacoes.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                    Nova Transação
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
