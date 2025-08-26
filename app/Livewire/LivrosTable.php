<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Livro;
use App\Models\Editora;

class LivrosTable extends Component
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
        $query = Livro::with(['editora', 'autores'])->when($this->search, function ($q) {
            $q->where(function ($q2) {
                $q2->where('nome', 'like', "%{$this->search}%")->orWhere('isbn', 'like', "%{$this->search}%");
            });
        })->when($this->publisherFilter, function ($q) {
            $q->where('editora_id', $this->publisherFilter);
        })->orderBy($this->sortField, $this->sortDirection);

        return view('livewire.livros-table', [
            'livros' => $query->paginate(100),
            'editoras' => Editora::all(),
        ]);
    }
}
