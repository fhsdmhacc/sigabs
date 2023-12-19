<?php

namespace App\Livewire\Questions;

use App\Models\Question;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateQuestion extends Component
{
    public string $title = 'Buat Pertanyaan Baru';

    public string $permission = 'create questions';

    #[Rule('required|string|max:250')]
    public string $name = '';

    public function mount()
    {
        $this->authorize($this->permission);
    }

    public function save()
    {
        $this->authorize($this->permission);

        $this->validate();

        Question::create([
            'uuid' => Str::uuid(),
            'name' => $this->name,
        ]);

        $this->redirect(route('questions.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.questions.create-question')->title($this->title);
    }
}
