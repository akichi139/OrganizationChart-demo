@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <ul id="myUL">
                    @foreach ($treeView as $orgUnit)
                    @include('orgUnits.orgUnit_item', ['orgUnit' => $orgUnit])
                    @endforeach
                </ul>
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
                        @livewire('organization-employees', ['orgUnit' => $orgUnit])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    ul,
    #myUL {
        list-style-type: none;
    }

    /* Add your custom CSS styles here to control the appearance of the tree */
    .caret {
        cursor: pointer;
        user-select: none;
    }

    .caret::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
    }

    /* Rotate the caret/arrow icon when clicked on (using JavaScript) */
    .caret-down::before {
        transform: rotate(90deg);
    }

    .nested {
        display: none;
    }

    .active {
        display: block;
    }

    .node:hover {
        background-color: lightgray;
    }

    .active_node {
        background-color: lightblue;
    }
</style>

@push('scripts')
<script>
    // JavaScript to handle the treeview functionality
    document.addEventListener('DOMContentLoaded', function () {
        const toggler = document.getElementsByClassName('caret');
        for (let i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener('click', function () {
                this.parentElement.querySelector('.nested').classList.toggle('active');
                this.classList.toggle('caret-down');
            });
        }
    });

    Livewire.on('orgUnitChanged', unitId => {
        alert('Unit change to the id of: ' + unitId);
    })

    const callToActionBtns = document.querySelectorAll(".node");

    callToActionBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            callToActionBtns.forEach(f => f.classList.remove('active_node'));
            e.target.classList.toggle("active_node");
        });
    });

</script>
@endpush

@endsection