<?php

namespace App\Http\Livewire;

use App\Models\OrganizationUnit;
use Livewire\Component;

class DisplayUnit extends Component
{
    public $orgUnit, $children, $child_id, $child_name, $child_short_name, $updateMode = false;

    protected $rules = [
        'child_name' => 'required|string',
        'child_short_name' => 'required|string',
    ];
    public $listeners = [
        'orgUnitChanged' => 'navigateTo',
        'cudUnit' => 'navigateTo'
    ];

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

    private function resetInputFields(){
        $this->child_name = '';
        $this->child_short_name = '';
    }

    public function edit($id)
    {
        $childOrgUnit = OrganizationUnit::findOrFail($id);
        $this->child_id = $id;
        $this->child_name = $childOrgUnit->title;
        $this->child_short_name = $childOrgUnit->body;
  
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate();
  
        $childOrgUnit = OrganizationUnit::find($this->child_id);
        
        $childOrgUnit->update([
            'name' => $this->child_name,
            'short_name' => $this->child_short_name,
            'is_company' => 0,
            'parent_id' => $this->orgUnit->id,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Organization Updated Successfully.');
        $this->resetInputFields();
        $this->emit('cudUnit', $this->orgUnit->id);
    }

    public function delete($id)
    {
        $orgUnit = OrganizationUnit::find($id);
        if($orgUnit->employees()->count() > 0){
            session()->flash('message', 'Organization Deleted Fail.');
            $this->emit('cudUnit', $this->orgUnit->id);
        }
        $orgUnit->delete();
        session()->flash('message', 'Organization Deleted Successfully.');
        $this->emit('cudUnit', $this->orgUnit->id);
    }
}