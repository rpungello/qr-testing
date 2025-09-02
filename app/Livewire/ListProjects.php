<?php

namespace App\Livewire;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ListProjects extends Component
{
    public function render(): View
    {
        return view('livewire.list-projects');
    }

    #[Computed]
    public function projects(): LengthAwarePaginator
    {
        return auth()->user()->projects()->paginate();
    }
}
