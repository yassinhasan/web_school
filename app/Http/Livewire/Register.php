<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $search = '';
 
    public function render()
    {
        return view('livewire.register', [
            'users' => User::where('name','like', $this->search)->get(),
        ]);
    }
 
}
