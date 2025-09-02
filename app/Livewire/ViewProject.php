<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ViewProject extends Component
{
    public Project $project;

    public function render():View
    {
        return view('livewire.view-project');
    }
}
