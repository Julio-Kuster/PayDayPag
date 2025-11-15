<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minha Carteira') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Saldo Disponível</h3>
                    <p class="text-3xl font-bold">R$ {{ number_format($carteira->saldo ?? 0, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Depositar na Carteira</h3>
                    <form action="{{ route('carteira.depositar') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="valor" class="block text-sm font-medium text-gray-700">Valor (R$)</label>
                            <input type="number" 
                                   name="valor" 
                                   id="valor" 
                                   step="0.01" 
                                   min="0.01"
                                   required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('valor')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <x-primary-button>Depositar</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
