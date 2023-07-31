<div class="mb-3">
    <label for="parent_id" class="form-label bold">Parent Unit:</label>
    <div>
        <span class="">{{ $orgUnit->name}} ({{ $orgUnit->short_name }}) </span>
    </div>
    <input wire:model="parent_id" type="hidden" name="parent_id" value="{{ $orgUnit->id }}" class="form-control">
</div>
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input wire:model="name" type="text" name="name" class="form-control" id="name" placeholder="Name">
    @error('name') <span class="error">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
    <label for="short_name" class="form-label">Short Name</label>
    <input wire:model="short_name" type="text" name="short_name" class="form-control" id="short_name"
        placeholder="Short Name">
    @error('short_name') <span class="error">{{ $message }}</span> @enderror
</div>