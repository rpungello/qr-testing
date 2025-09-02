<?php

namespace App\Livewire;

use App\Models\Code;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ViewCode extends Component
{
    public Code $code;

    #[Validate('max:255')]
    public ?string $name;

    #[Validate('max:1000')]
    public ?string $description;

    #[Validate(['required', 'max:255'])]
    public string $data;

    public function mount(): void
    {
        $this->name = $this->code->name;
        $this->description = $this->code->description;
        $this->data = $this->code->data;
    }

    public function render(): View
    {
        return view('livewire.view-code');
    }

    public function save(): void
    {
        $this->code->update($this->validate());
        $this->redirectRoute('resources.view', ['resource' => $this->code->resource]);
    }

    public function remove(): void
    {
        $this->code->delete();
        $this->redirectRoute('resources.view', ['resource' => $this->code->resource]);
    }
}
