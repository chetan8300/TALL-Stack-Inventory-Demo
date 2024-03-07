<div>

    <script>
        function closeAlert(event) {
            console.log('closeAlert');
            document.getElementById("successMessage").remove();
        }
    </script>

    @if (session()->has('message'))
        <div id="successMessage" role="alert" class="rounded-xl border border-gray-100 bg-white p-4 mb-4">
            <div class="flex items-center gap-4">
                <span class="{{ session('type') === 'success' ? 'text-green-500' : 'text-red-500' }}">
                @if (session('type') === "success")
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-6 w-6"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path
                            fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd"
                        />
                    </svg>
                @endif
                </span>

                <div class="flex-1">
                    <strong class="block font-medium text-gray-900"> {{ session('message') }} </strong>
                    {{-- <p class="mt-1 text-sm text-gray-700">Your product changes have been saved.</p> --}}
                </div>

                <button
                    class="text-gray-500 transition hover:text-gray-600"
                    onclick="document.getElementById('successMessage').remove()"
                >
                    <span class="sr-only">Dismiss popup</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-6 w-6"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <script>
            (function() {
                console.log('closeAlert');
                setTimeout(() => {
                    closeAlert();
                }, 3000);
            })()
        </script>
    @endif

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            List of Parts
        </h2>
    </x-slot>

    <div class="flex justify-end items-center gap-3 mb-3">
        <h6 class="pl-3 text-3xl font-semibold flex-1">
            Parts
        </h3>
        <form wire:submit.prevent="search" class="flex gap-3">
            <input type="text" wire:model="searchTerm" placeholder="Search by part number or bin/shelf" class="rounded-md border-gray-200 shadow-sm sm:text-sm w-60" />
        </form>
        @if(count($parts) > 0)
            <x-primary-button wire:click="exportToPdf">Export to PDF</x-primary-button>
            <x-primary-button wire:click="exportToCsv">Export to CSV</x-primary-button>
        @endif
        <x-primary-button wire:click="$dispatch('openModal', { component: 'part-import-modal' })">
            Import Parts
        </x-primary-button>
        <x-primary-button wire:click="$dispatch('openModal', { component: 'part-modal' })">
            New Part
        </x-primary-button>
    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">Part Name</th>
                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">Part Number</th>
                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">Quantity</th>
                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">Bin Location</th>
                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">Unit Price</th>
                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">Active</th>
                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($parts as $part)
                <tr>
                    <td align="center" class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">{{ $part->part_name }}</td>
                    <td align="center" class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $part->part_number }}</td>
                    <td align="center" class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $part->quantity }}</td>
                    <td align="center" class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $part->bin_location }}</td>
                    <td align="center" class="whitespace-nowrap px-4 py-2 text-gray-700 font-medium">{{ Number::currency($part->unit_price) }}</td>
                    <td align="center" class="whitespace-nowrap px-4 py-2 text-gray-700">
                        @if ($part->active)
                            <svg
                                class="h-5 w-5 fill-green-500 text-bold"
                                focusable="false"
                                aria-hidden="true"
                                viewBox="0 0 24 24"
                                data-testid="CheckIcon"
                            >
                                <path d="M9 16.17 4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"></path>
                            </svg>
                        @else
                        <svg
                            class="h-5 w-5 fill-red-500 text-bold"
                            focusable="false"
                            aria-hidden="true"
                            viewBox="0 0 24 24"
                            data-testid="CloseIcon"
                        >
                            <path d="M19 6.41 17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                        </svg>
                        @endif
                    </td>
                    <td align="center" class="whitespace-nowrap px-4 py-2 text-gray-700 flex justify-center gap-1">
                        <x-secondary-button wire:click="$dispatch('openModal', { component: 'part-modal', arguments: { part: {{ $part }} }})">
                            Edit
                        </x-secondary-button>
                        <x-danger-button wire:click="$dispatch('openModal', { component: 'part-delete-modal', arguments: { part_id: {{ $part->id }} }})">
                            Delete
                        </x-danger-button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>