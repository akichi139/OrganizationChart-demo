<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <x-unit-navigation-bs5 :breadcrumbs="$breadcrumbs" />
                        <button type="button" class="btn btn-primary" 
                            data-bs-toggle="modal" 
                            data-bs-url="{{ route('organization-unit.add-child', $orgUnit->id) }}"
                            data-bs-header="Add Child Unit"
                            data-bs-target="#largeModal">
                        +
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div>
                        <div class="container-fluid-">                            
                            @foreach ($children as $unit)
                              <div class="row">
                                  <div class="col-md-8"> <a href="{{ route('unit.show', $unit->id)}}"> {{ $unit->name }} </a></div>
                                  <div class="col-md-2"> {{ $unit->short_name }} </div>
                                  <div class="col-md-2"> @include('organization-units.partials.buttons') </div>
                              </div>
                            @endforeach    
                        </div>
                        @livewire('search-employee-organization', ['orgUnit' => $orgUnit], key($orgUnit->id))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.large-modal')
@push('scripts')
    <script>
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