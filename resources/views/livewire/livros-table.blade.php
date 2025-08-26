<div class="p-2">
    <div class="flex flex-row mb-4 relative">
        <h2 class="text-2xl font-bold self-center mx-4">Livros</h2>

        <label class="input mr-4">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input type="text" wire:model.live="search" placeholder="Search" class="input">
        </label>

        <select wire:model.live="publisherFilter" class="select select-md">
            <option value="">Todas as Editoras</option>
            @foreach ($editoras as $editora)
                <option value="{{ $editora->id }}">{{ $editora->nome }}</option>
            @endforeach
        </select>
        <div class="self-center absolute right-10">
            <a href="{{ route('livros.export') }}" class="btn btn-soft btn-primary">Exportar Tabela</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra table-sm table-pin-rows table-pin-cols">
            <thead>
                <tr>
                    <th wire:click="sortBy('isbn')" class="cursor-pointer">ISBN</th>
                    <th wire:click="sortBy('nome')" class="cursor-pointer">Nome</th>
                    <th>Editora</th>
                    <th>Autores</th>
                    <th>Bibliografia</th>
                    <th>Capa</th>
                    <th wire:click="sortBy('preco')" class="cursor-pointer">Preço</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($livros as $livro)
                    <tr>
                        <td class="text-sm">{{ $livro->isbn }}</td>
                        <td class="text-sm">{{ $livro->nome }}</td>
                        <td class="text-sm">{{ $livro->editora->nome }}</td>
                        <td>
                            @foreach ($livro->autores as $autor)
                                <span class="badge badge-primary mb-1">{{ $autor->nome }}</span>
                            @endforeach
                        </td>
                        <td>{{ $livro->bibliografia }}</td>
                        <td>
                            <!--<img src="" alt="capa" class="rounded-xl w-24">-->
                            <div class="avatar">
                                <div class="w-2/5 rounded-full">
                                    <img src="{{ $livro->capa }}" />
                                </div>
                            </div>
                        </td>
                        <td class="text-sm">{{ $livro->preco }}</td>
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
