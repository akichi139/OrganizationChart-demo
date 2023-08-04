<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrganizationUnit;

class OrganizationUnitTree extends Component
{
    public $orgUnits;

    public function mount()
    {
        $this->orgUnits = OrganizationUnit::all();
    }

    public function render()
    {
        return view('livewire.organization-unit-tree');
    }
}
