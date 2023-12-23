<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditStudent extends Component
{
    public string $title = 'Buat Siswa Baru';

    // public string $permission = 'create locations';

    #[Locked]
    public $id;

    public $student;

    #[Rule('required|string|max:250')]
    public string $name = '';

    #[Rule('required|integer|numeric')]
    public string $identification_number = '';

    #[Rule('required|date|date_format:Y-m-d')]
    public string $birthday = '';

    #[Rule('required|string|in:L,P|max:250')]
    public string $gender = '';

    #[Rule('required|string|max:250')]
    public string $class = '';

    public function mount(Student $student)
    {
        // $this->authorize($this->permission);

        $this->id = $student->id;

        $this->name = $student->name;

        $this->identification_number = $student->identification_number;

        $this->birthday = $student->birthday->format('Y-m-d');

        $this->gender = $student->gender;

        $this->class = $student->class;
    }

    public function save()
    {
        // $this->authorize($this->permission);

        $this->validate();

        $student = Student::findOrFail($this->id);

        $student->update([
            'name' => $this->name,
            'identification_number' => $this->identification_number,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'class' => $this->class,
        ]);

        $this->redirect(route('students.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.students.edit-student')->title($this->title);
    }
}
