<?php

namespace App\Http\Livewire\Dashboard\Applications;

use Illuminate\Support\Facades\Response;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.dashboard.applications.create');
    }

    public function downloadFile($businessName="King Accounting")
    {
        $attachmentName = str_replace(' ', '_', $businessName)."_Entry";

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$attachmentName.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $collumns = array("Business Name", "Business ID", "RTO Value", "Lead Member", "Information");
        $entries = array($businessName, 56, 30, "Jane Doe", "Torres Accounting is a accounting firm which required a firm trap over view.");

        $callback = function() use ($collumns, $entries)
        {
            $file = fopen('php://output', 'w');

            fputcsv($file, $collumns);
            fputcsv($file, $entries);

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
