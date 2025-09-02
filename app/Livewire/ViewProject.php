<?php

namespace App\Livewire;

use App\Models\Project;
use Flux\Flux;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ViewProject extends Component
{
    public Project $project;

    #[Validate('required')]
    public string $name;

    #[Validate(['required', 'url'])]
    public string $url;

    #[Validate('max:1000')]
    public ?string $description;

    public function mount(): void
    {
        $this->name = $this->project->name;
        $this->url = $this->project->url;
        $this->description = $this->project->description;
    }

    public function render(): View
    {
        return view('livewire.view-project');
    }

    public function save(): void
    {
        $this->project->update($this->validate());
        Flux::toast('Project updated successfully!', variant: 'success');
    }

    public function remove(): void
    {
        $this->project->delete();
        $this->redirectRoute('projects.index');
    }
}
