<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class AssignedApplications extends Component
{
    public function render()
    {
        return view('livewire.dashboard.assigned-applications')->layout('layouts.app', ['title' => 'DWK - Dashboard Assigned Applications']);
    }
}
