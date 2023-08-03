<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrganizationUnit;

class TreeView extends Component
{
    public $orgUnit;
    public $treeViews;
    public $currentUnit;

    public $listeners = [
        'orgUnitChanged' => 'changeCurrentUnit',
        'cudUnit' => 'changeCurrentUnit'
    ];
    public function changeCurrentUnit($unitId)
    {
        $this->currentUnit = $unitId;
    }
    public function mount()
    {
        $this->orgUnit = OrganizationUnit::root()->first();
        $this->treeViews = $this->orgUnit->getNavigationLinks();
        $this->currentUnit = $this->orgUnit->id;
    }

    public function render()
    {
        return view('livewire.tree-view');
    }
}
