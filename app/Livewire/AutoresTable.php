<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Autor;

class AutoresTable extends Component
{
        use WithPagination;

    public $search = '';
    public $sortField = 'nome';
    public $sortDirection = 'asc';
    public $publisherFilter = null;

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field)
        {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $query = Autor::with(['livros'])->when($this->search, function ($q) {
            $q->where(function($q2) {
                $q2->where('nome', 'like', "%{$this->search}%")
                    ->orWhereHas('livros', function($q3) {
                    $q3->where('nome', 'like', "%{$this->search}%");
                });
            });
        })->orderBy($this->sortField, $this->sortDirection);

        return view('livewire.autores-table', [
            'autores' => $query->paginate(100),
        ]);
    }
}
