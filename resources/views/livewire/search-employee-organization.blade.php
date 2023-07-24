<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-primary" type="button">Add Employee</button>
                </div>
                <form>
                    <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" />
                </form>
            </div>

            <table class="table table-bordered" style="margin: 10px 0 10px 0;">
                <tr>
                    <td>Employee</td>
                    <td>Job Role</td>
                </tr>
                @foreach($orgUnit->employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }} ({{ $employee->jobPosition->name }})</td>
                    <td>{{ $jobRoles[$employee->pivot->job_role_id] }}</td>
                </tr>
                @endforeach
            </table>
            {!!$employees->links('pagination::bootstrap-5')!!}
        </div>
    </div>
</div>