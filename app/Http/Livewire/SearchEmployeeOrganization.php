<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use App\Models\OrganizationUnit;
use App\Models\JobRole;

class SearchEmployeeOrganization extends Component
{
    use WithPagination;
    public $searchTerm = '';
    public $orgUnit;

    protected $listeners = ['selectUnit'];
    public function mount($orgUnit)
    {
        $this->orgUnit = $orgUnit;
    }

    public function selectUnit($unitId)
    {
        $this->orgUnit = OrganizationUnit::find($unitId);
        $this->searchTerm = ''; // Reset search term when selecting a new unit
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';

        $employees = $this->orgUnit->employees()
            ->where('first_name', 'like', $searchTerm)
            ->paginate(5);

        $jobRoles = JobRole::pluck('name', 'id');

        return view('livewire.search-employee-organization', compact('employees', 'jobRoles'));
    }
}
