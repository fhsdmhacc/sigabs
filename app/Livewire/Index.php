<?php

namespace App\Livewire;

use Livewire\Component;

class Index extends Component
{
    public ?string $title = null;

    public function render()
    {
        return view('livewire.index')->title($this->title);
    }
}
