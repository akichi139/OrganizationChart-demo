<form action="{{ route('organization-unit.add-child-org') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="parent_id" class="form-label bold">Parent Unit:</label>
        <div>
            <span class="">{{ $parentUnit->name}} ({{ $parentUnit->short_name }})</span>
        </div>
        <input type="hidden" name="parent_id" value="{{ $parentUnit->id }}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
    </div>
    <div class="mb-3">
        <label for="short_name" class="form-label">Short Name</label>
        <input type="text" name="short_name" class="form-control" id="short_name" placeholder="Short Name">
    </div>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</form>