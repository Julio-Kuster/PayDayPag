<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Meu Comércio') }}
            </h2>
            @if(!$comercio)
                <a href="{{ route('comercio.create') }}" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cadastrar Comércio
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if($comercio)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold">{{ $comercio->nome_empresa }}</h3>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                                Ativo
                            </span>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500">CNPJ</p>
                                <p class="text-lg font-semibold">{{ $comercio->cnpj }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Cadastrado em</p>
                                <p class="text-lg font-semibold">{{ $comercio->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-center">
                        <p class="text-lg font-semibold mb-4">Nenhum comércio cadastrado</p>
                        <p class="text-gray-600 mb-6">Cadastre seu comércio para começar a receber pagamentos</p>
                        <a href="{{ route('comercio.create') }}" class="inline-block bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Cadastrar Comércio
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
