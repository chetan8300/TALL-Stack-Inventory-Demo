<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Part;
use Livewire\Attributes\On;
use Dompdf\Dompdf;
use Dompdf\Options;

class PartList extends Component {
    public $searchTerm = "";
    public $results = [];

    public function search() {
        $this->validate([
            'searchTerm' => 'required|string',
        ]);

        if ($this->searchTerm !== null && $this->searchTerm !== "") {
            $this->results = Part::where('part_number', 'like', '%'.$this->searchTerm.'%')
                                    ->orWhere('bin_location', 'like', '%'.$this->searchTerm.'%')
                                    ->get();
        }
    }

    public function exportToPdf() {
        $pdfData = view('pdf.parts', ['parts' => $this->results])->render();


        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($pdfData);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return response()->streamDownload(function () use ($dompdf) {
            echo $dompdf->output();
        }, 'parts.pdf');
    }

    public function exportToCsv() {
        $csvData = $this->results->map(function ($part) {
            return [
                'Part Name' => $part->part_name,
                'Part Number' => $part->part_number,
                'Quantity' => $part->quantity,
                'Bin/Shelf' => $part->bin_location,
                'Unit Price' => $part->unit_price,
                'Active' => $part->active ? 'Yes' : 'No',
            ];
        });

        $csvFileName = 'parts.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            "Content-Disposition" => "attachment; filename=".$csvFileName,
            'Content-Transfer-Encoding' => "UTF-8"
        ];
    
        return response()->streamDownload(function () use ($csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, array_keys($csvData->first()));
            $csvData->each(function ($row) use ($handle) {
                fputcsv($handle, $row);
            });
            fclose($handle);
        }, $csvFileName, $headers, 'attachment');
    }

    public function render() {

        $this->results = $this->searchTerm === "" ? Part::all() : $this->results;

        return view('livewire.part-list', [
            'parts' => $this->results,
        ]);
    }

    #[On('refresh-list')]
    public function refresh() {}

    #[On('show-message')]
    public function showMessage($type = "success", $message) {
        session()->flash('message', $message);
        session()->flash('type', $type);
    }
}