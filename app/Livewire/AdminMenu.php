<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class AdminMenu extends Component
{
    public $isAdmin;

    public function mount()
    {
        $this->isAdmin = Gate::allows('admin');
    }

    public function render()
    {
        return view('sla');
    }
}