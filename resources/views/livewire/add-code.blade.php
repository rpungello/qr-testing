<div>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item icon="home" :href="route('dashboard')"/>
        <flux:breadcrumbs.item :href="route('projects.index')">
            {{ __('Projects') }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('projects.view', $resource->project)">
            {{ $resource->project->name }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('resources.view', $resource)">
            {{ $resource->name }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            {{ __('Add Code') }}
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <form wire:submit.prevent="submit" class="space-y-4">
        <!-- Name -->
        <flux:input wire:model="name"
                    label="{{ __('Name') }}"
        />

        <!-- Description -->
        <flux:textarea wire:model="description"
                       label="{{ __('Description') }}"
        />

        <!-- Name -->
        <flux:input wire:model="data"
                    label="{{ __('QR Data') }}"
        />

        <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
    </form>
</div>
