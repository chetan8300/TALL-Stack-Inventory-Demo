<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Part;

class PartImportForm extends Form
{
    #[Validate('required|file|mimes:json')]
    public $json_file;

    public function import(): void {
        $this->validate();

        $json = json_decode($this->json_file->get(), true);

        if (!is_array($json) || count($json) === 0 || !isset($json[0])) {
            $this->addError('json_file', 'Invalid JSON file.');
            return;
        }

        $requiredKeys = ['part_name', 'part_number', 'quantity', 'bin_location', 'active', 'unit_price'];
        foreach ($json as $item) {
            if (!$this->checkKeysExist($item, $requiredKeys)) {
                $this->addError('json_file', 'Invalid JSON file. Missing required keys in one or more items.');
                return;
            }
        }

        Part::insert($json);

        $this->reset();
    }

    private function checkKeysExist($array, $keys)
    {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $array)) {
                return false;
            }
        }
        return true;
    }

    public function rules(): array {
        return [
            'json_file' => 'required|file|mimes:json',
        ];
    }

    // Previous properties and methods...
    public function validationAttributes(): array {
        return [
            'form.json_file' => 'json_file',
        ];
    }
}
