<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><x-unit-navigation-bs5 :breadcrumbs="$breadcrumbs" /></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div>
                        <div>
                            <table class="table">
                                @foreach ($children as $unit)
                                <tr>
                                    <td> 
                                        <a wire:click="selectUnit({{ $unit->id }})">
                                            {{ $unit->name }}
                                        </a>
                                    </td>
                                    <td> {{ $unit->short_name }} </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        @livewire('search-employee-organization', ['orgUnit' => $orgUnit], key($orgUnit->id))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
