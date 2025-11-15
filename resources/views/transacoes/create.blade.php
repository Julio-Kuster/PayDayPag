<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Transação') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <p class="text-sm text-gray-600">Saldo disponível:</p>
                    <p class="text-2xl font-bold">R$ {{ number_format(optional($carteira)->saldo ?? 0, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('transacoes.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="beneficiario_id" class="block text-sm font-medium text-gray-700">Enviar para</label>
                            <select name="beneficiario_id" 
                                    id="beneficiario_id" 
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Selecione um usuário</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }} ({{ $usuario->email }})</option>
                                @endforeach
                            </select>
                            @error('beneficiario_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="metodo_pagamento_id" class="block text-sm font-medium text-gray-700">Método de Pagamento</label>
                            @if($metodosPagamento->count() > 0)
                                <select name="metodo_pagamento_id" 
                                        id="metodo_pagamento_id" 
                                        required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Selecione um método</option>
                                    @foreach($metodosPagamento as $metodo)
                                        <option value="{{ $metodo->id }}">{{ $metodo->nome }}</option>
                                    @endforeach
                                </select>
                            @else
                                <p class="mt-1 text-sm text-yellow-600">Nenhum método de pagamento disponível.</p>
                            @endif
                            @error('metodo_pagamento_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="valor" class="block text-sm font-medium text-gray-700">Valor (R$)</label>
                            <input type="number" 
                                   name="valor" 
                                   id="valor" 
                                   step="0.01" 
                                   min="0.01"
                                   required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   placeholder="0.00">
                            @error('valor')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-4">
                            <x-primary-button>Enviar Pagamento</x-primary-button>
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
