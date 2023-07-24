<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrganizationUnit;

class DisplayOrganizationUnit extends Component
{
    public $orgUnit;


    public function mount(OrganizationUnit $orgUnit = null)
    {
        if (is_null($orgUnit)) {
            $orgUnit = OrganizationUnit::root()->first();
        }
        $this->orgUnit = $orgUnit;
    }

    public function render()
    {
        $orgUnit = $this->orgUnit;
        $children = $this->orgUnit->children()->get();
        $breadcrumbs = $this->orgUnit->getNavigationLinks();

        return view('livewire.display-organization-unit', compact('orgUnit', 'children', 'breadcrumbs'));
    }

    public function selectUnit($unitId)
    {
        $this->orgUnit = OrganizationUnit::find($unitId);
        $this->emit('selectUnit', $unitId);
    }
}
