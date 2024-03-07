<div>
    <div class="bg-gray-50 px-6 py-4">
        <p class="text-xl font-bold text-gray-900">{{ $part ? 'Edit' : 'Create' }} Part</p>
    </div>
    <div class="p-6">
        <form wire:submit="save">
            <div>
                <x-input-label for="part_name" :value="__('Part Name')" />
                <x-text-input wire:model="form.part_name" id="part_name" class="w-full" type="text" />
                <x-input-error :messages="$errors->get('form.part_name')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="part_number" :value="__('Part Number')" />
                <x-text-input wire:model="form.part_number" id="part_number" class="mt-1 block w-full" type="text" />
                <x-input-error :messages="$errors->get('form.part_number')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="quantity" :value="__('Quantity')" />
                <x-text-input wire:model="form.quantity" id="quantity" class="mt-1 block w-full" type="number" />
                <x-input-error :messages="$errors->get('form.quantity')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="bin_location" :value="__('Bin Location')" />
                <x-text-input wire:model="form.bin_location" id="bin_location" class="mt-1 block w-full" type="text" />
                <x-input-error :messages="$errors->get('form.bin_location')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="unit_price" :value="__('Unit Price')" />
                <x-text-input wire:model="form.unit_price" id="unit_price" class="mt-1 block w-full" type="text" />
                <x-input-error :messages="$errors->get('form.unit_price')" class="mt-2" />
            </div>
            <div class="mt-4 flex items-center gap-2">
                <x-input-label for="active" :value="__('Is Active?')" />
                <input wire:model="form.active" id="active" class="block" type="checkbox" />
                <x-input-error :messages="$errors->get('form.active')" class="mt-2" />
            </div>

            <!-- Save button -->
            <div class="mt-4 flex justify-end gap-1.5">
                <x-default-button wire:click="closeModal" type="button">
                    Cancel
                </x-default-button>
                <x-primary-button type="submit">
                    {{ $part ? 'Update' : 'Save' }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>