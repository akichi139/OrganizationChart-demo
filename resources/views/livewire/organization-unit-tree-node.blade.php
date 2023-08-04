<li>
    <div class="col-md-8">
        @if ($orgUnit->id == $currentUnitId)
            <span>{{ $orgUnit->name }}</span>
        @else
            <a href="#" wire:click="$emit('orgUnitChanged', {{ $orgUnit->id }})"> {{ $orgUnit->name }} </a>
        @endif
    </div>

    @if ($children->count() > 0)
        <ul>
            @foreach ($children as $child)
                @livewire('organization-unit-tree-node', ['orgUnit' => $child])
            @endforeach
        </ul>
    @endif
</li>