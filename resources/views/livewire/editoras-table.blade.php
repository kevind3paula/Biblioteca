<div class="p-4">
    <div class="flex flex-row mb-4">
        <h2 class="text-2xl font-bold self-center mx-4">Editoras</h2>

        <label class="input mr-4">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input type="text" wire:model.live="search" placeholder="Search" class="input focus:outline-none">
        </label>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra table-pin-rows table-pin-cols">
            <thead>
                <tr>
                    <th wire:click="sortBy('nome')" class="cursor-pointer">Nome</th>
                    <th class="w-1/5">logo</th>
                    <th>Livros</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($editoras as $editora)
                    <tr>
                        <td class="text-sm">{{ $editora->nome }}</td>
                        <td>
                            <div class="avatar w-1/4">
                                <div class="rounded-full">
                                    <img
                                        src="https://img.wook.pt/images/torto-arado-itamar-vieira-junior/MXwyMjgxODcwMnwxODY5NDMzMHwxNTQ4Mzc0NDAwMDAwfHdlYnA=/502x?ctx=0" />
                                </div>
                            </div>
                        </td>
                        <td>
                            @foreach ($editora->livros as $livro)
                                <span class="badge badge-primary">{{ $livro->nome }}</span>
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhum Livro Encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
