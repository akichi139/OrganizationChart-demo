<?php

namespace App\Http\Livewire;

use App\Models\OrganizationUnit;
use Livewire\Component;

class DisplayUnit extends Component
{
    public $orgUnit, $children, $child_id, $child_name, $child_short_name, $updateMode = false;

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
        $childOrgUnit = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
  
        $childOrgUnit = OrganizationUnit::find($this->child_id);
        $childOrgUnit->update([
            'name' => $this->child_name,
            'short_name' => $this->child_short_name,
            'is_company' => 0,
            'parent_id' => $this->orgUnit->id,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        OrganizationUnit::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}