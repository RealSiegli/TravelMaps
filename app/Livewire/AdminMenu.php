<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminMenu extends Component
{
    public $isAdmin;

    public function mount()
    {
        $this->isAdmin = Auth::check() && Auth::user()->role === 'Admin';
    }

    public function render()
    {
        return view('sla');
    }
}
