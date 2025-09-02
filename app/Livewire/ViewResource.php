<?php

namespace App\Livewire;

use App\Models\Resource;
use Flux\Flux;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ViewResource extends Component
{
    public Resource $resource;

    #[Validate('required')]
    public string $name;

    #[Validate('max:1000')]
    public ?string $description;

    public function mount(): void
    {
        $this->resource->load('codes');
        $this->name = $this->resource->name;
        $this->description = $this->resource->description;
    }

    public function render(): View
    {
        return view('livewire.view-resource');
    }

    public function save(): void
    {
        $this->resource->update($this->validate());

        Flux::toast('Resource updated successfully!', variant: 'success');
    }

    public function remove(): void
    {
        $this->resource->delete();
        $this->redirectRoute('projects.view', ['project' => $this->resource->project]);
    }
}
