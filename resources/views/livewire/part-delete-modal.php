<div>
    <div class="px-6 py-4">
        <p class="text-xl font-bold text-gray-900">Delete Part</p>
    </div>
    <div class="px-6 pt-3">
        <p>Are you sure you want to delete this part?</p>
    </div>
    <div class="mt-4 flex justify-end gap-1 px-6 py-3">
        <button wire:click="closeModal" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Cancel
        </button>
        <button wire:click="delete" class="bg-red-500 text-white font-bold py-2 px-4 rounded" wire:ignore.self>
            Delete
        </button>
    </div>
</div>