<div class="p-2">
    <x-div_filter>
        <x-table_title class="">Livros</x-table_title>

        <x-search_input></x-search_input>

        <select wire:model.live="publisherFilter" class="select select-md focus:border-transparent rounded-full">
            <option value="">Todas as Editoras</option>
            @foreach ($editoras as $editora)
                <option value="{{ $editora->id }}">{{ $editora->nome }}</option>
            @endforeach
        </select>
        <div class="self-center absolute right-10">
            <a href="{{ route('livros.export') }}" class="btn btn-soft btn-primary">Exportar Tabela</a>
        </div>
    </x-div_filter>

    <x-div_table>
        <x-table>
            <x-thead>
                <tr class="text-base">
                    <x-th_arrow filter="isbn">
                        ISBN
                    </x-th_arrow>
                    <x-th_arrow filter="nome">
                        Nome
                    </x-th_arrow>
                    <x-th_table>Editora</x-th_table>
                    <x-th_table>Autores</x-th_table>
                    <x-th_table class="w-1/4">Bibliografia</x-th_table>
                    <x-th_table class="w-32">Capa</x-th_table>
                    <x-th_arrow filter="preco" class="w-32">
                        Preço
                    </x-th_arrow>
                </tr>
            </x-thead>
            <x-tbody>
                @forelse ($livros as $livro)
                    <tr class="hover:bg-gray-50">
                        <x-td_table>{{ $livro->isbn }}</x-td_table>
                        <x-td_table class="px-6 py-4 font-medium text-gray-900">{{ $livro->nome }}</x-td_table>
                        <x-td_table>{{ $livro->editora->nome }}</x-td_table>
                        <td>
                            @foreach ($livro->autores as $autor)
                                <x-span_badge>{{ $autor->nome }}</x-span_badge>
                            @endforeach
                        </td>
                        <td>{{ $livro->bibliografia }}</td>
                        <x-img_td class="w-md">
                            https://img.wook.pt/images/torto-arado-itamar-vieira-junior/MXwyMjgxODcwMnwxODY5NDMzMHwxNTQ4Mzc0NDAwMDAwfHdlYnA=/502x?ctx=0
                        </x-img_td>
                        <x-td_table class="px-6 py-4 font-medium text-gray-900">€{{ $livro->preco }}</x-td_table>
                    </tr>
                @empty
                    <x-empty_search colspan="7">Nenhum Livro Encontrado</x-empty_search>
                @endforelse
            </x-tbody>
        </x-table>
    </x-div_table>
</div>
