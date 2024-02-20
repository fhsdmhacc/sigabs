<?php

namespace App\Livewire\Classrooms;

use App\Models\Classroom;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateClassroom extends Component
{
    public string $title = 'Buat Kelas Baru';

    public string $permission = 'create classrooms';

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

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => auth()->user()->id,
            'name' => $this->name,
        ]);

        $this->redirect(route('classrooms.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.classrooms.create-classroom')->title($this->title);
    }
}
