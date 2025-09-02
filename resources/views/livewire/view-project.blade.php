<div>
    <form wire:submit.prevent="save" class="space-y-4">
        <!-- Heading -->
        <flux:heading size="xl" level="1">
            {{ __('View Project') }}
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
        <flux:modal.trigger name="delete-project">
            <flux:button variant="danger" type="button">{{ __('Delete') }}</flux:button>
        </flux:modal.trigger>
    </form>

    <flux:table>
        <flux:table.columns>
            <flux:table.column>{{ __('Name') }}</flux:table.column>
            <flux:table.column>{{ __('QR Count') }}</flux:table.column>
            <flux:table.column />
        </flux:table.columns>

        <flux:table.rows>
            @foreach($project->resources as $resource)
                <flux:table.row>
                    <flux:table.cell>{{ $resource->name }}</flux:table.cell>
                    <flux:table.cell>{{ \Illuminate\Support\Number::format($resource->codes->count()) }}</flux:table.cell>
                    <flux:table.cell>
                        <!-- Actions -->
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <flux:modal name="delete-project" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete project?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this project.</p>
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
                    Delete project
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
