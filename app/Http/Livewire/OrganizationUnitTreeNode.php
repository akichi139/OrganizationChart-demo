<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrganizationUnit;

class OrganizationUnitTreeNode extends Component
{
    public $orgUnit;
    public $currentUnitId;

    public $listeners = [
        'orgUnitChanged' => 'changeCurrentUnit',
        'cudUnit' => 'changeCurrentUnit'
    ];

    public function changeCurrentUnit($unitId)
    {
        $this->currentUnitId = $unitId;
    }

    public function render()
    {
        $children = OrganizationUnit::where('parent_id', $this->orgUnit->id)->get();

        return view('livewire.organization-unit-tree-node', [
            'children' => $children,
        ]);
    }

    public function mount()
    {
        $this->currentUnitId = OrganizationUnit::root()->first()->id;
    }
}
