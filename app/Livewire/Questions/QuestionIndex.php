<?php

namespace App\Livewire\Questions;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionIndex extends Component
{
    use WithPagination;

    public string $title = 'Pertanyaan';

    public string $permission = 'index questions';

    public function mount()
    {
        $this->authorize($this->permission);
    }

    public function render()
    {
        return view('livewire.questions.question-index', [
            'questions' => Question::orderByDesc('id')->fastPaginate(5)
        ])->title($this->title);
    }
}
