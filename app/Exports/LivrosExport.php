<?php

namespace App\Exports;

use App\Models\Livro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LivrosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Livro::with(['editora', 'autores'])->get()->map(function($livro) {
            return [
                'ISBN' => $livro->isbn,
                'Nome' => $livro->nome,
                'Editora' => $livro->editora->nome ?? '',
                'Autores' => $livro->autores->pluck('nome')->implode(', '),
                'Bibliografia' => $livro->bibliografia,
                'Peço' => $livro->preco,
            ];
        });
    }
    
    public function headings(): array
    {
        return ['ISBN', 'Nome', 'Editora', 'Autores', 'Bibliografia', 'Preço'];
    }
}
