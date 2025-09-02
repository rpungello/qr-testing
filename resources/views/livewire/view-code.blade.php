<div>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item icon="home" :href="route('dashboard')"/>
        <flux:breadcrumbs.item :href="route('projects.index')">
            {{ __('Projects') }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('projects.view', $code->resource->project)">
            {{ $code->resource->project->name }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('resources.view', $code->resource)">
            {{ $code->resource->name }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            {{ $code->name ?: $code->data }}
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <form wire:submit.prevent="save" class="space-y-4">
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
        <flux:modal.trigger name="delete-code">
            <flux:button variant="danger" type="button">{{ __('Delete') }}</flux:button>
        </flux:modal.trigger>
    </form>

    <flux:modal name="delete-code" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete code?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this code.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer/>
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button type="button"
                             variant="danger"
                             wire:click="remove"
                >
                    Delete code
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
