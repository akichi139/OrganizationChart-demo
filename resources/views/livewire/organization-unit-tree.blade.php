<div>
    @if ($orgUnits->count() > 0)
        <ul>
            @foreach ($orgUnits as $orgUnit)
                @if (is_null($orgUnit->parent))
                    @livewire('organization-unit-tree-node', ['orgUnit' => $orgUnit])
                @endif
            @endforeach
        </ul>
    @else
        <p>No Organization Units found.</p>
    @endif
</div>