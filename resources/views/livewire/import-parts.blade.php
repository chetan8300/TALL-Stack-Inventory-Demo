<div class="p-4 border rounded shadow">
    <form wire:submit.prevent="import" class="space-y-4">
        <input type="file" wire:model="jsonFile" class="border rounded-md px-4 py-2 w-full">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Import Parts</button>
    </form>
    @if (session()->has('message'))
        <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif
</div>