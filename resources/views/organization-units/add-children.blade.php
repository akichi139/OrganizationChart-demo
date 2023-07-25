<div>
    <form>
        <div class="mb-3">
            <label for="parent_id" class="form-label bold">Parent Unit: </label>
            <div>
                <span class="">  {{ $parentUnit->name}} ({{ $parentUnit->short_name }})</span>
            </div>
            <input type="hidden" wire:model="parent_id" class="form-control" id="parent_id" placeholder="Parent ID">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="mb-3">
            <label for="short_name" class="form-label">Short Name</label>
            <input type="text" wire:model="short_name" class="form-control" id="short_name" placeholder="Short Name">
        </div>
    </form>
</div>