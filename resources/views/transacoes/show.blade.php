<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Transação') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('transacoes.index') }}" class="text-indigo-600 hover:text-indigo-900 mb-4 inline-block">← Voltar para transações</a>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Tipo</p>
                            <p class="text-lg font-semibold">
                                @if($transacao->pagador_id == Auth::id())
                                    <span class="text-red-600">Enviado</span>
                                @else
                                    <span class="text-green-600">Recebido</span>
                                @endif
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Valor</p>
                            <p class="text-2xl font-bold 
                                @if($transacao->pagador_id == Auth::id()) text-red-600 @else text-green-600 @endif">
                                @if($transacao->pagador_id == Auth::id())-@endif
                                R$ {{ number_format($transacao->valor, 2, ',', '.') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                                @if($transacao->status == 'concluido') bg-green-100 text-green-800
                                @elseif($transacao->status == 'pendente') bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ ucfirst($transacao->status) }}
                            </span>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Método de Pagamento</p>
                            <p class="text-lg font-semibold">{{ $transacao->metodoPagamento->nome }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                @if($transacao->pagador_id == Auth::id())
                                    Enviado para
                                @else
                                    Recebido de
                                @endif
                            </p>
                            <p class="text-lg font-semibold">
                                @if($transacao->pagador_id == Auth::id())
                                    {{ $transacao->beneficiario->name }}
                                @else
                                    {{ $transacao->pagador->name }}
                                @endif
                            </p>
                            <p class="text-sm text-gray-600">
                                @if($transacao->pagador_id == Auth::id())
                                    {{ $transacao->beneficiario->email }}
                                @else
                                    {{ $transacao->pagador->email }}
                                @endif
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Data</p>
                            <p class="text-lg font-semibold">{{ $transacao->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
