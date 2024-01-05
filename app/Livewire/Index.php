<?php

namespace App\Livewire;

use App\Models\Faq;
use Livewire\Component;

class Index extends Component
{
    public ?string $title = null;

    public $faqs;

    public function mount()
    {
        $this->faqs = Faq::get();
    }

    public function render()
    {
        return view('livewire.index')->title($this->title);
    }
}
