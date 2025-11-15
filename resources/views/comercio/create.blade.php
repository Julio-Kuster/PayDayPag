<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Comércio') }}
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('comercio.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="nome_empresa" class="block text-sm font-medium text-gray-700">Nome da Empresa</label>
                            <input type="text" 
                                   name="nome_empresa" 
                                   id="nome_empresa" 
                                   required
                                   maxlength="100"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   placeholder="Ex: Minha Loja LTDA">
                            @error('nome_empresa')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ (apenas números)</label>
                            <input type="text" 
                                   name="cnpj" 
                                   id="cnpj" 
                                   required
                                   maxlength="14"
                                   pattern="[0-9]{14}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   placeholder="00000000000000">
                            <p class="mt-1 text-xs text-gray-500">Digite apenas os 14 dígitos do CNPJ</p>
                            @error('cnpj')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-4">
                            <x-primary-button>Cadastrar</x-primary-button>
                            <a href="{{ route('comercio.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
