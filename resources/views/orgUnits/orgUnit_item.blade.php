@if ($orgUnit)
<li>
    @if ($orgUnit->children->count() != 0)
    <span class="caret"></span>
    @endif
    <a class="node" href="#" onclick="window.livewire.emit('orgUnitChanged', {{ $orgUnit->id }})" style="color:black; text-decoration: none;">- {{ $orgUnit->name }}
    </a>
    @if ($orgUnit->children->count() > 0)
    <ul class="nested">
        @foreach ($orgUnit->children as $child)
        @include('orgUnits.orgUnit_item', ['orgUnit' => $child])
        @endforeach
    </ul>
    @endif
</li>
@endif
