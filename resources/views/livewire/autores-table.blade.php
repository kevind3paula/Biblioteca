<div class="p-6">
    <x-div_filter>
        <x-table_title>Autores</x-table_title>

        <x-search_input></x-search_input>
    </x-div_filter>

    <x-div_table>
        <x-table>
            <x-thead>
                <tr class="text-base">
                    <x-th_arrow filter="nome" class="w-1/3">
                        Nome
                    </x-th_arrow>
                    <x-th_table class="w-1/3">Foto</x-th_table>
                    <x-th_table class="w-1/3">Livros</x-th_table>
                </tr>
            </x-thead>
            <x-tbody>
                @forelse ($autores as $autor)
                    <tr class="hover:bg-gray-50">
                        <x-td_table class="px-6 py-4 font-medium text-gray-900">{{ $autor->nome }}</x-td_table>
                        <x-img_td class="w-32">
                            https://img.wook.pt/images/torto-arado-itamar-vieira-junior/MXwyMjgxODcwMnwxODY5NDMzMHwxNTQ4Mzc0NDAwMDAwfHdlYnA=/502x?ctx=0
                        </x-img_td>
                        <x-td_table>
                            @foreach ($autor->livros as $livro)
                                <x-span_badge>{{ $livro->nome }}</x-span_badge>
                            @endforeach
                        </x-td_table>
                    </tr>
                @empty
                    <x-empty_search colspan="3">Nenhum Autor ou Livro Encontrado</x-empty_search>
                @endforelse
            </x-tbody>
        </x-table>
    </x-div_table>
</div>
