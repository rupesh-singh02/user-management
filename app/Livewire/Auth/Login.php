<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;
    public $errorMessage = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->with('role')->first();

        if ($user && Hash::check($this->password, $user->password)) {
            if ($user->role && $user->role->name === 'Admin') {
                Auth::login($user);
                return redirect()->route('admin.dashboard');
            } elseif ($user->role) {
                Auth::login($user);
                return redirect()->route('dashboard');
            } else {
                $this->errorMessage = 'You are not authorized to access this area.';
                return;
            }
        }

        $this->errorMessage = 'Invalid credentials. Please try again.';
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
}
