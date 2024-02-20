<?php

namespace App\Livewire\Classrooms;

use App\Models\Classroom;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditClassroom extends Component
{
    public string $title = 'Ubah Kelas';

    public string $permission = 'update classrooms';

    #[Locked]
    public $id;

    #[Rule('required|string|max:250')]
    public string $name = '';

    public function mount(Classroom $classroom)
    {
        $this->authorize($this->permission);

        $this->id = $classroom->id;

        $this->name = $classroom->name;
    }

    public function save()
    {
        $this->authorize($this->permission);

        $this->validate();

        $classroom = Classroom::findOrFail($this->id);

        $classroom->update([
            'name' => $this->name,
        ]);

        $this->redirect(route('classrooms.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.classrooms.edit-classroom')->title($this->title);
    }
}
