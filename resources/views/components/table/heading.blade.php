@props(['sortable' => false, 'field' => null])

<th scope="col"
    {{ $attributes->merge(['class' => 'px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider']) }}>
    <div class="flex items-center space-x-1">
        <span>{{ $slot }}</span>

        @if($sortable && $field)
            <button wire:click="$dispatch('sort', { field: '{{ $field }}' })" class="text-xs text-gray-400 hover:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                </svg>
            </button>
        @endif
    </div>
</th>
