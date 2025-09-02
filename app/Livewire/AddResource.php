<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddResource extends Component
{
    public Project $project;

    #[Validate('required')]
    public string $name = '';

    #[Validate('max:1000')]
    public string $description = '';

    public function render(): View
    {
        return view('livewire.add-resource');
    }

    public function submit(): void
    {
        $this->project->resources()->create(
            $this->validate()
        );

        $this->redirectRoute('projects.view', ['project' => $this->project->getKey()]);
    }
}
