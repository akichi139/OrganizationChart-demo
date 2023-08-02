<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrganizationUnit;

class AddChildrenBtn extends Component
{
    public $orgUnit, $short_name, $name;

    protected $rules = [
        'name' => 'required|string',
        'short_name' => 'required|string',
    ];

    public $listeners = [
        'orgUnitChanged' => 'navigateTo',
        'cudUnit' => 'navigateTo'
    ];

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

    public function resetInputFields()
    {
        $this->name = '';
        $this->short_name = '';
    }
    public function store()
    {
        $this->validate();

        OrganizationUnit::create([
            'name' => $this->name,
            'short_name' => $this->short_name,
            'is_company' => 0,
            'parent_id' => $this->orgUnit->id,
        ]);

        $this->resetInputFields();
        $this->emit('cudUnit', $this->orgUnit->id);
    }
}
