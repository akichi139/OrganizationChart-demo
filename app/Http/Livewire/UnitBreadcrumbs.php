<?php

namespace App\Http\Livewire;

use App\Models\OrganizationUnit;
use Livewire\Component;

class UnitBreadcrumbs extends Component
{
    public $orgUnit;

    public $breadcrumbs;

    public $listeners = [
        'orgUnitChanged' => 'navigateTo',
        'cudUnit' => 'navigateTo'
    ];
    
    public function mount(OrganizationUnit $orgUnit)
    {
        $this->orgUnit = $orgUnit;
        $this->breadcrumbs = $this->orgUnit->getNavigationLinks();
    }

    public function navigateTo($unitId)
    {
        $this->orgUnit = OrganizationUnit::find($unitId);
        $this->breadcrumbs = $this->orgUnit->getNavigationLinks();
    }
    public function render()
    {
        return view('livewire.unit-breadcrumbs');
    }
}