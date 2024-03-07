<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Part;

class PartForm extends Form
{
    public ?Part $part = null;
    public string $part_number = "";
    public string $part_name = "";
    public int $quantity = 0;
    public string $bin_location = "";
    public bool $active = true;
    public float $unit_price = 0;

    public function setPart(?Part $part = null): void {
        $this->part = $part;
        $this->part_number = $part->part_number;
        $this->part_name = $part->part_name;
        $this->quantity = $part->quantity;
        $this->bin_location = $part->bin_location;
        $this->active = $part->active;
        $this->unit_price = $part->unit_price;
    }

    public function save(): void {
        $this->validate();
        if (!$this->part) {
            Part::create($this->only([
                'part_name',
                'part_number',
                'quantity',
                'bin_location',
                'active',
                'unit_price',
            ]));
        } else {
            $this->part->update($this->only([
                'part_name',
                'part_number',
                'quantity',
                'bin_location',
                'active',
                'unit_price',
            ]));
        }
        $this->reset();
    }

    public function rules(): array {
        return [
            'part_name' => 'required|string',
            'part_number' => 'required|string',
            'quantity' => 'required|integer',
            'bin_location' => 'required|string',
            'active' => 'required|boolean',
            'unit_price' => 'required|numeric',
        ];
    }

    // Previous properties and methods...
    public function validationAttributes(): array {
        return [
            'form.part_name' => 'part_name',
            'form.part_number' => 'part_number',
            'form.quantity' => 'quantity',
            'form.bin_location' => 'bin_location',
            'form.active' => 'active',
            'form.unit_price' => 'unit_price',
        ];
    }
}
