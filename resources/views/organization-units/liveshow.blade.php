@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
        const modal = document.querySelector('#largeModal');
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const url = button.getAttribute('data-bs-url');
            const modalHeader = modal.querySelector('.modal-title');
            const modalBody = modal.querySelector('.modal-body');
            modalHeader.innerHTML = button.getAttribute('data-bs-header');
            modalBody.innerHTML = '';
            
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    modalBody.innerHTML = html;
                });
        });
    </script>
@endpush
@endsection