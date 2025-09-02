<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item icon="home" :href="route('dashboard')"/>
        <flux:breadcrumbs.item :href="route('projects.index')">
            {{ __('Projects') }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('projects.view', $project)">
            {{ $project->name }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            {{ __('Print') }}
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="space-y-4">
        @foreach($project->resources as $resource)
            <div>
                <flux:heading size="lg" level="1">{{ $resource->name }}</flux:heading>
                @if($resource->description)
                    <p class="whitespace-pre-wrap text-sm opacity-50">{{ $resource->description }}</p>
                @endif
                <div class="flex flex-row flex-wrap gap-4">
                    @foreach($resource->codes as $code)
                        <flux:card>
                            @if($code->name)
                                <flux:heading level="2">
                                    {{ $code->name }}
                                </flux:heading>
                            @endif
                            @if($code->description)
                                <p class="whitespace-pre-wrap text-sm opacity-50">{{ $code->description }}</p>
                            @endif
                            {!! $code->qrCodeSvg(200) !!}
                        </flux:card>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.app>
