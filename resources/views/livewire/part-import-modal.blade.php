<div>
    <div class="bg-gray-50 px-6 py-4">
        <p class="text-xl font-bold text-gray-900">Import Parts</p>
    </div>
    <div class="p-6">
        <form wire:submit="save">
            <div>
                <x-input-label for="json_file" :value="__('Select File')" />
                <x-text-input wire:model="form.json_file" id="json_file" type="file" accept=".json" />
                <x-input-error :messages="$errors->get('form.json_file')" class="mt-2" />
            </div>

            <!-- Save button -->
            <div class="mt-4 flex justify-end gap-1.5">
                <x-default-button wire:click="closeModal" type="button">
                    Cancel
                </x-default-button>
                <x-primary-button type="submit">
                    Upload
                </x-primary-button>
            </div>
        </form>
    </div>
</div>