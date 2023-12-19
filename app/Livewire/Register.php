<?php

namespace App\Livewire;

use Livewire\Component;

class Register extends Component
{
    public string $title = 'Daftar';

    public function render()
    {
        return view('livewire.register')->title($this->title);
    }
}
