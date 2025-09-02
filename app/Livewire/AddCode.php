<?php

namespace App\Livewire;

use App\Models\Resource;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddCode extends Component
{
    public Resource $resource;

    #[Validate('max:255')]
    public string $name = '';

    #[Validate('max:1000')]
    public string $description = '';

    #[Validate(['required', 'max:255'])]
    public string $data = '';

    public function render(): View
    {
        return view('livewire.add-code');
    }

    public function submit(): void
    {
        $this->resource->codes()->create($this->validate());
        $this->redirectRoute('resources.view', $this->resource);
    }
}
