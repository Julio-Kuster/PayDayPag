<div class="flex items-center gap-3">
    <!-- Ícone de Cartão de Crédito -->
    <svg viewBox="0 0 512 320" xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => 'h-9 w-auto']) }}>
        <!-- Cartão principal com bordas arredondadas -->
        <rect x="16" y="16" width="480" height="288" rx="12" fill="none" stroke="currentColor" stroke-width="16"/>
        
        <!-- Faixa horizontal superior (característica de cartões) -->
        <rect x="16" y="16" width="480" height="72" rx="12" fill="currentColor" opacity="0.2"/>
        
        <!-- Chip do cartão -->
        <rect x="48" y="120" width="64" height="48" rx="4" fill="currentColor" opacity="0.4"/>
        <rect x="56" y="128" width="48" height="32" rx="2" fill="currentColor" opacity="0.7"/>
        
        <!-- Linhas representando números do cartão -->
        <rect x="160" y="130" width="96" height="6" rx="3" fill="currentColor" opacity="0.7"/>
        <rect x="160" y="150" width="64" height="6" rx="3" fill="currentColor" opacity="0.7"/>
        
        <!-- Símbolo de check/validação -->
        <circle cx="400" cy="144" r="32" fill="none" stroke="currentColor" stroke-width="8" opacity="0.6"/>
        <path d="M385 144 L395 154 L415 130" stroke="currentColor" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" fill="none" opacity="0.8"/>
        
        <!-- Ondas de transação -->
        <path d="M400 220 Q420 200 440 220 T480 220" stroke="currentColor" stroke-width="8" fill="none" stroke-linecap="round" opacity="0.5"/>
    </svg>
    
    <!-- Nome do Serviço -->
    <span class="font-bold text-xl text-gray-800">PayDayPag</span>
</div>
