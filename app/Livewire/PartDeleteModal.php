<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Contracts\View\View;
use App\Models\Part;

class PartDeleteModal extends ModalComponent {
    public $part_id = null;

    public function mount($part_id): void {
        $this->part_id = $part_id;
    }

    public function render(): View {
        return view('livewire.part-delete-modal');
    }

    public function delete(): void {
        $part = Part::findOrFail($this->part_id);
        $part->delete();
        $this->dispatch('refresh-list');
        $this->closeModal();
    }
}
