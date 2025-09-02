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
        <flux:modal.trigger name="delete-resource">
            <flux:button variant="danger" type="button">{{ __('Delete') }}</flux:button>
        </flux:modal.trigger>
    </form>

    <flux:table>
        <flux:table.columns>
            <flux:table.column>{{ __('Name') }}</flux:table.column>
            <flux:table.column>{{ __('Description') }}</flux:table.column>
            <flux:table.column>{{ __('QR Data') }}</flux:table.column>
            <flux:table.column />
        </flux:table.columns>

        <flux:table.rows>
            @foreach($resource->codes as $code)
                <flux:table.row>
                    <flux:table.cell>{{ $code->name }}</flux:table.cell>
                    <flux:table.cell>{{ $code->description }}</flux:table.cell>
                    <flux:table.cell>{{ $code->data }}</flux:table.cell>
                    <flux:table.cell>

                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <!-- Add Code -->
    <flux:button variant="primary"
                 icon="plus"
                 :href="route('resources.add-code', ['resource' => $resource])"
    >
        {{ __('Add Code') }}
    </flux:button>

    <flux:modal name="delete-resource" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete resource?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this resource.</p>
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
                    Delete resource
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
