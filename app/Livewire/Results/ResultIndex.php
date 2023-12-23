<?php

namespace App\Livewire\Results;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class ResultIndex extends Component
{
    use WithPagination;

    public string $title = 'Hasil';

    // public string $permission = 'index locations';

    public function mount()
    {
        // $this->authorize($this->permission);
    }

    public function render()
    {
        return view('livewire.results.result-index', [
            'students' => Student::with([
                'results' => function ($query) {
                    $query->orderBy('total');
                }
            ])->fastPaginate(5)
        ])->title($this->title);
    }
}
