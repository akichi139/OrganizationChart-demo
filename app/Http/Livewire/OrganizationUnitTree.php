<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrganizationUnit;

class OrganizationUnitTree extends Component
{
    public $orgUnits;

    public $currentUnitId;

    public $listeners = [
        'orgUnitChanged' => 'changeCurrentUnit',
        'cudUnit' => 'changeCurrentUnit'
    ];

    public function changeCurrentUnit($unitId)
    {
        $this->currentUnitId = $unitId;
    }
    public function mount()
    {
        $this->orgUnits = OrganizationUnit::all();
    }

    public function render()
    {
        return view('livewire.organization-unit-tree');
    }
}
