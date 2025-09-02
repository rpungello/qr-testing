<div>
    <form wire:submit.prevent="save" class="space-y-4">
        <!-- Heading -->
        <flux:heading size="xl" level="1">
            {{ __('View Resource') }}
        </flux:heading>

        <!-- Name -->
        <flux:input wire:model="name"
                    label="{{ __('Name') }}"
        />

        <!-- Description -->
        <flux:textarea wire:model="description"
                       label="{{ __('Description') }}"
        />

        <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
    </form>
</div>
