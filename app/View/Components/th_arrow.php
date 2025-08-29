<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class th_arrow extends Component
{
    public $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    public function render(): View
    {
        return view('components.th_arrow');
    }
}
