<div>
    <form wire:submit.prevent="submit" class="space-y-4">
        <!-- Heading -->
        <flux:heading size="xl" level="1">
            {{ __('New Project') }}
        </flux:heading>

        <!-- Name -->
        <flux:input wire:model="name"
                    label="{{ __('Name') }}"
        />

        <!-- URL -->
        <flux:input wire:model="url"
                    label="{{ __('URL') }}"
                    type="url"
        />

        <!-- Description -->
        <flux:textarea wire:model="description"
                       label="{{ __('Description') }}"
        />

        <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
    </form>
</div>
