<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use App\Models\OrganizationUnit;
use App\Models\JobRole;

class OrganizationEmployees extends Component
{
    use WithPagination;
    public $searchTerm;
    public $orgUnit;

    public $listeners = ['orgUnitChanged' => 'navigateTo'];

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

        $jobRoles = JobRole::pluck('name', 'id');

        return view('livewire.organization-employees', compact('employees', 'jobRoles'));
    }
}