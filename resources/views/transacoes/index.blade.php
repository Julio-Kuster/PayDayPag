<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Histórico de Transações') }}
            </h2>
            <a href="{{ route('transacoes.create') }}" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Nova Transação
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                                                    <span class="text-red-600">Enviado</span>
                                                @else
                                                    <span class="text-green-600">Recebido</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                @if($transacao->pagador_id == Auth::id())
                                                    {{ $transacao->beneficiario->name }}
                                                @else
                                                    {{ $transacao->pagador->name }}
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
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
                        <div class="mt-4">
                            {{ $transacoes->links() }}
                        </div>
                    @else
                        <p class="text-gray-500">Nenhuma transação encontrada.</p>
                        <a href="{{ route('transacoes.create') }}" class="mt-4 inline-block bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Nova Transação
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
