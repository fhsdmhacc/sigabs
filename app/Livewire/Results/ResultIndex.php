<?php

namespace App\Livewire\Results;

use App\Models\Classroom;
use App\Models\Result;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ResultIndex extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    public string $title = 'Hasil';

    public string $permission = 'index results';

    public function mount()
    {
        $this->authorize($this->permission);
    }

    public function render()
    {
        return view('livewire.results.result-index', [
            'classrooms' => Classroom::with([
                'students',
                'students.result',
                // 'students.results.type',
            ])
            ->filter([
                'search' => $this->search
            ])
            ->orderByDesc('id')
            ->fastPaginate(5)
        ])->title($this->title);
    }
}
