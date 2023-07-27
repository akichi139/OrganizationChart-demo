<form>
    @csrf
    <div class="mb-3">
        <label for="parent_id" class="form-label bold">Parent Unit:</label>
        <div>
            <span class="">{{ $orgUnit->name}} ({{ $orgUnit->short_name }}) </span>
        </div>
        <input wire:model="parent_id" type="hidden" name="parent_id" value="{{ $orgUnit->id }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input wire:model="child_name" type="text" name="child_name" class="form-control" id="name" placeholder="Name" value="{{ $unit->name }}">
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="short_name" class="form-label">Short Name</label>
        <input wire:model="child_short_name" type="text" name="child_short_name" class="form-control" id="short_name"
            placeholder="Short Name" value="{{ $unit->short_name }}">
        @error('short_name') <span class="error">{{ $message }}</span> @enderror
    </div>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    <button wire:click.prevent="update()" class="btn btn-primary">Update</button>
</form>