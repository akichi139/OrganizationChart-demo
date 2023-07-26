<?php

namespace App\Http\Livewire;

use App\Models\OrganizationUnit;
use Livewire\Component;

class DisplayUnit extends Component
{
    public $orgUnit;

    public $children;

    public $listeners = ['orgUnitChanged' => 'navigateTo'];

    public function mount($orgUnit)
    {
        if ($orgUnit == null) {
            $orgUnit = OrganizationUnit::root()->first();
        }
        
        $this->orgUnit = $orgUnit;
        $this->children = $orgUnit->children()->get();
    }

    /**
     * This action to change unit is from self so notify other
     * @param mixed $unitId 
     * @return void 
     */
    public function navigateTo($unitId)
    {        
        $this->orgUnit = OrganizationUnit::find($unitId);
        $this->children = $this->orgUnit->children()->get();
    }

    public function render()
    {
        return view('livewire.display-unit');
    }
}