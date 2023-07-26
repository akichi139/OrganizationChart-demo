<div class="container-fluid-">                            
    @foreach ($orgUnit->children()->get() as $unit)
      <div class="row">
          <div class="col-md-8"> <a href="#" wire:click="$emit('orgUnitChanged', {{ $unit->id }})"> {{ $unit->name }} </a></div>
          <div class="col-md-2"> {{ $unit->short_name }} </div>
          <div class="col-md-2"> @include('organization-units.partials.buttons') </div>
      </div>
      @endforeach                            
</div>