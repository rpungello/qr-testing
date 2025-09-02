<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProject extends Component
{
    #[Validate('required')]
    public string $name = '';

    #[Validate(['required', 'url'])]
    public string $url = '';

    #[Validate('max:1000')]
    public string $description = '';

    public function render(): View
    {
        return view('livewire.create-project');
    }

    public function submit(): void
    {
        $this->redirectRoute('projects.view', [
            'project' => $this->createProject(),
        ]);
    }

    private function createProject(): Project
    {
        return auth()->user()->projects()->create($this->validate());
    }
}
