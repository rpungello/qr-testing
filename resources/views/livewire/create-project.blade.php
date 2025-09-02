<div>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item icon="home" :href="route('dashboard')"/>
        <flux:breadcrumbs.item :href="route('projects.index')">
            {{ __('Projects') }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            {{ __('New Project') }}
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <form wire:submit.prevent="submit" class="space-y-4">
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
