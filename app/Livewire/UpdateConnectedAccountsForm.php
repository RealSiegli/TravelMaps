<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UpdateConnectedAccountsForm extends Component
{
    public $state = [
        'instagram_handle' => '',
    ];

    public function mount()
    {
        $this->state['instagram_handle'] = Auth::user()->instagram_handle;
    }

    public function render()
    {
        return view('profile.update-connected-accounts-form');
    }

    public function updateConnectedAccounts()
    {
        $this->validate([
            'state.instagram_handle' => 'required|string|max:255',
        ]);

        Auth::user()->update([
            'instagram_handle' => $this->state['instagram_handle'],
        ]);

        $this->dispatch('saved');
    }
}
