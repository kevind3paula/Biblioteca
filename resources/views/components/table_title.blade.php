<div class="mr-4">
    <h2 {{ $attributes->merge(['class' => 'text-5xl/7 font-quicksand font-bold self-center mx-6']) }}>
        <span class="bg-gradient-to-r from-indigo-700 to-blue-500 bg-clip-text text-transparent">
            {{ $slot }}
        </span>
    </h2>
</div>
