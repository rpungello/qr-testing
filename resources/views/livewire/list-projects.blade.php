<div>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item icon="home" :href="route('dashboard')"/>
        <flux:breadcrumbs.item>
            {{ __('Projects') }}
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <flux:table>
        <flux:table.columns>
            <flux:table.column>{{ __('Name') }}</flux:table.column>
            <flux:table.column>{{ __('URL') }}</flux:table.column>
            <flux:table.column>{{ __('Description') }}</flux:table.column>
            <flux:table.column/>
        </flux:table.columns>

        <flux:table.rows>
            @foreach($this->projects as $project)
                <flux:table.row>
                    <flux:table.cell>{{ $project->name }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:link :href="$project->url">
                            {{ $project->url }}
                        </flux:link>
                    </flux:table.cell>
                    <flux:table.cell><p class="whitespace-pre-wrap">{{ $project->description }}</p></flux:table.cell>
                    <flux:table.cell>
                        <!-- Edit Button -->
                        <flux:button icon="pencil"
                                     size="sm"
                                     :href="route('projects.view', ['project' => $project])"
                        />
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    <flux:button icon="plus"
                 variant="primary"
                 href="{{ route('projects.create') }}"
    >
        {{ __('Create') }}
    </flux:button>

</div>
