<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public string $title = 'Beranda';

    public function render()
    {
        return view('livewire.home')->title($this->title);
    }
}
