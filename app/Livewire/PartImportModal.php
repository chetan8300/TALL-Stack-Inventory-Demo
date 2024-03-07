<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Contracts\View\View;

class PartImportModal extends ModalComponent {
    public Forms\PartImportForm $form;

    use WithFileUploads;

    public function render(): View {
        return view('livewire.part-import-modal');
    }

    public function save(): void {
        $this->form->import();
        if ($this->getErrorBag()->any()) {
            return;
        } else {
            $this->closeModal();
            $this->dispatch('refresh-list');
            $this->dispatch('show-message', 'success', 'Parts imported successfully.');
        }
    }
}
