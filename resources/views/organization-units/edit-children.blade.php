<div class="mb-3">
    <label for="parent_id" class="form-label bold">Parent Unit:</label>
    <select wire:model="change_parent" class="form-select" id="change_parent" name="change_parent">
        @foreach($organizations as $organization)
        <option value="{{ $organization->id }}" @selected($organization->id == $orgUnit->id) >{{ $organization->name }}</option>
        @endforeach
    </select>
    <input wire:model="parent_id" type="hidden" name="parent_id" value="{{ $orgUnit->id }}" class="form-control">
</div>
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input wire:model="child_name" type="text" name="child_name" class="form-control" id="name" placeholder="Name"
        value="{{ $unit->name }}">
    @error('name') <span class="error">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
    <label for="short_name" class="form-label">Short Name</label>
    <input wire:model="child_short_name" type="text" name="child_short_name" class="form-control" id="short_name"
        placeholder="Short Name" value="{{ $unit->short_name }}">
    @error('short_name') <span class="error">{{ $message }}</span> @enderror
</div>