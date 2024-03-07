<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Part;

class ImportParts extends Component {
    public $jsonFile;

    public function render() {
        return view('livewire.import-parts');
    }

    public function import() {
        $this->validate([
            'jsonFile' => 'required|mimes:json|max:2048', // Adjust file size limit as needed
        ]);

        $contents = file_get_contents($this->jsonFile->getRealPath());
        $parts = json_decode($contents, true);

        foreach ($parts as $part) {
            Part::create($part);
        }

        session()->flash('message', 'Parts imported successfully.');

        $this->reset('jsonFile');
    }
}
