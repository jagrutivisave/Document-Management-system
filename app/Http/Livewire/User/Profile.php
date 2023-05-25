<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
        
    public function render()
    {
        $user = Auth::user();
        return view('livewire.user.profile',compact('user'))->layout('layouts.user-app');
    }
}