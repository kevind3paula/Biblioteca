<th scope="col" {{ $attributes->merge(['class' => 'px-6 py-4 font-semibold text-gray-900']) }}>
    {{ $slot }}
    <label class="swap ml-3">
        <input wire:click="sortBy('{{ $filter }}')" type="checkbox" class="hidden" />
        <div class="swap-on"><i class="fa-solid fa-circle-arrow-up"></i></div>
        <div class="swap-off"><i class="fa-solid fa-circle-arrow-down"></i></div>
    </label>
</th>
