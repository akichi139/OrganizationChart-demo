@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <!-- Add your sidebar content here -->
                    @livewire('tree-view')
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        @livewire('unit-breadcrumbs', ['orgUnit' => $orgUnit])
                        @livewire('add-children-btn', ['orgUnit' => $orgUnit])
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        @livewire('display-unit', ['orgUnit' => $orgUnit])
                    </div>
                    <div>
                        @livewire('organization-employees', ['orgUnit' => $orgUnit])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    Livewire.on('orgUnitChanged', unitId => {
        alert('Unit change to the id of: ' + unitId);
    })
</script>
@endpush
@endsection