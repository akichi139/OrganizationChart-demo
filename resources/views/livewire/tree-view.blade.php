<div class="container-fluid-">
    @if($orgUnit->id==$currentUnit)
        <div class="col-md-8">{{ $orgUnit->short_name }}</div>
    @else
        <div class="col-md-8"> <a href="#" wire:click="$emit('orgUnitChanged', {{ $orgUnit->id }})"> {{ $orgUnit->short_name }} </a></div>
    @endif
    @foreach ($orgUnit->children()->get() as $unit)
    <div class="row">
        @if($unit->id==$currentUnit)
            <div class="col-md-8">&emsp;►{{ $unit->short_name }}</div>
        @else
        <div class="col-md-8">&emsp;►<a href="#" wire:click="$emit('orgUnitChanged', {{ $unit->id }})"> {{ $unit->short_name }} </a></div>
        @endif
        @if($orgUnit->children()->get()->count() > 0)
        @foreach ($unit->children()->get() as $subunit)
        <div class="row">
            @if($subunit->id==$currentUnit)
            <div class="col-md-8">&emsp;&emsp;►{{ $subunit->short_name }}</div>
            @else
            <div class="col-md-8">&emsp;&emsp;►<a href="#" wire:click="$emit('orgUnitChanged', {{ $subunit->id }})">{{ $subunit->short_name }}</a></div>
            @endif
        </div>
        @endforeach
        @endif
    </div>
    @endforeach
</div>