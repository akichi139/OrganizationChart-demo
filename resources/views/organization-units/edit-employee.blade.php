<div class="mb-3">
    <label for="employee_id" class="form-label bold">Employee:</label>
    <div>
        <span class="">{{ $employee->first_name}} {{ $employee->last_name }}</span>
    </div>
    <input wire:model="employee_id" type="hidden" name="employee_id" value="{{ $employee->id }}" class="form-control">
</div>
<div class="mb-3">
    <label for="orgUnitToChange" class="form-label">Organization</label>
    <select wire:model="orgUnitToChange" class="form-select" id="orgUnitToChange" name="orgUnitToChange">
        @foreach($organizations as $organization)
        <option value="{{ $organization->id }}" @selected($organization->id == $employee->pivot->organization_unit_id) >{{ $organization->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="short_name" class="form-label">jobRole</label>
    <select wire:model="jobRolesToChange" class="form-select" id="jobRolesToChange" name="jobRolesToChange">
        @foreach($jobRoles as $jobRole)
        <option value="{{ $jobRole->id }}" @selected($jobRole->id == $employee->pivot->job_role_id) >{{ $jobRole->name }}</option>
        @endforeach
    </select>
</div>
