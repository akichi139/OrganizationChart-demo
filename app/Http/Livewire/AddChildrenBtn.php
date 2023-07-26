<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrganizationUnit;

class AddChildrenBtn extends Component
{
    public $orgUnit;

    public $listeners = ['orgUnitChanged' => 'navigateTo'];

    public function mount(OrganizationUnit $orgUnit)
    {
        $this->orgUnit = $orgUnit;
    }

    public function navigateTo($unitId)
    {
        $this->orgUnit = OrganizationUnit::find($unitId);
    }

    public function render()
    {
        return view('livewire.add-children-btn');
    }
}
