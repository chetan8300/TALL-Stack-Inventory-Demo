<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Contracts\View\View;
use App\Models\Part;

class PartModal extends ModalComponent {
    public ?Part $part = null;
    public Forms\PartForm $form;

    public function mount(Part $part = null): void
    {
        if ($part->exists) {
            $this->form->setPart($part);
        }
    }
    public function render(): View {
        return view('livewire.part-modal');
    }

    public function save(): void {
        $isUpdate = $this->part;
        $this->form->save();

        if ($this->getErrorBag()->any()) {
            return;
        }

        $this->closeModal();
        $this->dispatch('refresh-list');

        if ($isUpdate) {
            $this->dispatch('show-message', 'success', 'Part updated successfully.');
        } else {
            $this->dispatch('show-message', 'success', 'Part created successfully.');
        }
    }
}
