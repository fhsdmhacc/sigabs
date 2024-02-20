<?php

namespace App\Livewire\Results;

use App\Models\Classroom;
use App\Models\Result;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ShowResult extends Component
{
    public string $title = 'Detail Hasil';

    public string $permission = 'read results';

    #[Locked]
    public $id;

    public $classroom;

    public $results;

    public function mount(Classroom $classroom)
    {
        $this->authorize($this->permission);

        $this->id = $classroom->id;

        $this->classroom = $classroom;

        $this->results = Result::with([
            'student'
        ])
        ->whereRelation('student', 'classroom_id', $classroom->id)
        ->get();
    }

    public function render()
    {
        return view('livewire.results.show-result')->title($this->title);
    }
}
