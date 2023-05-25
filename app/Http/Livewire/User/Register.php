<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name,
        $mobno,
        $email,
        $bdate,
        $password;

    public function render()
    {
        return view('livewire.user.register')->layout('layouts.user-login');
    }
    public function create()
    {
        $users = new User();
        $this->validate([
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'email' => ['required', 'email', 'unique:users'],
            'mobno' => ['required', 'string'],
            'bdate' => ['required', 'string'],
            'password' => ['required', 'string', 'min:3', 'max:12'],
        ]);

        $users->name = $this->name;
        $users->email = $this->email;
        $users->mobno = $this->mobno;
        $users->bdate = $this->bdate;
        $users->password = Hash::make($this->password);

        $result = $users->save();
        if ($result) 
        {
            session()->flash('success', 'registration Successfully Admin will approve your account in 2 mint and also check your mail ');
            $this->name = '';
            $this->email = '';
            $this->mobno = '';
            $this->bdate = '';
            $this->password = '';
            $this->c_password = '';
            return redirect(route('user.login'));
        }
    }
}
