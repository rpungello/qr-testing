<div>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item icon="home" :href="route('dashboard')"/>
        <flux:breadcrumbs.item :href="route('projects.index')">
            {{ __('Projects') }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('projects.view', $project)">
            {{ $project->name }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            {{ __('Add Resource') }}
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

        <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
    </form>
</div>
