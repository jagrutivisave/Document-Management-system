<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $dailyCount;
    public $monthlyCount;
    public $yearlyCount;

    public function mount()
    {
        // Query the database to get the counts of registrations for each period
        $this->dailyCount = DB::table('documents')
            ->whereDate('created_at', today())
            ->count();
        $this->monthlyCount = DB::table('documents')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();
        $this->yearlyCount = DB::table('documents')
            ->whereYear('created_at', now()->year)
            ->count();
    }

    public function render()
    {
        return view('livewire.user.dashboard')->layout('layouts.user-app');
    }
}