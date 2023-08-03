<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use App\Models\OrganizationUnit;
use App\Models\JobRole;
use Carbon\Carbon;

class OrganizationEmployees extends Component
{
    use WithPagination;
    public $searchTerm;
    public $orgUnit;

    public $employee_id, $orgUnitToChange, $jobRolesToChange, $updateMode = false;

    protected $rules = [
        'orgUnitToChange' => 'required|exists:organization_units,id',
        'jobRolesToChange' => 'required|exists:job_roles,id',
    ];
    public $listeners = [
        'orgUnitChanged' => 'navigateTo',
        'cudUnit' => 'navigateTo'
    ];

    public function mount(OrganizationUnit $orgUnit = null)
    {
        $this->orgUnit = $orgUnit ?? OrganizationUnit::root()->first();
    }

    public function navigateTo($unitId)
    {
        $this->orgUnit = OrganizationUnit::find($unitId);
        $this->render();
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';

        $employees = $this->orgUnit->employees()
            ->where('first_name', 'like', $searchTerm)
            ->paginate(5);

        $jobRoles = JobRole::all();

        $organizations = OrganizationUnit::all();

        return view('livewire.organization-employees', compact('employees', 'jobRoles', 'organizations'));
    }

    private function resetInputFields(){
        $this->orgUnitToChange = $this->orgUnit;
        $this->jobRolesToChange = '';
    }

    public function edit($id)
    {
        $employee = $this->orgUnit->employees()->wherePivot('employee_id', $id)->first();

        $this->employee_id = $id;
        $this->orgUnitToChange = $employee->pivot->organization_unit_id;
        $this->jobRolesToChange = $employee->pivot->job_role_id;
  
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
  
        $employee = Employee::findOrFail($this->employee_id);
        
        $employee->organizationUnits()->detach($this->orgUnit);

        $moveDept = OrganizationUnit::where('id', $this->orgUnitToChange)->first();

        $moveDept->employees()->attach($employee->id, [
            'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
            'job_role_id' => $this->jobRolesToChange
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Organization Updated Successfully.');
        $this->resetInputFields();
        $this->emit('cudUnit', $this->orgUnitToChange);
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->organizationUnits()->detach($this->orgUnit);
        session()->flash('message', 'Organization Deleted Successfully.');
        $this->emit('cudUnit', $this->orgUnit->id);
    }
}