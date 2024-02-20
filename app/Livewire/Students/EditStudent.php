<?php

namespace App\Livewire\Students;

use App\Models\Classroom;
use App\Models\Student;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditStudent extends Component
{
    public string $title = 'Ubah Siswa';

    public string $permission = 'update students';

    #[Locked]
    public $id;

    #[Rule('required|string|max:250')]
    public string $name = '';

    #[Rule('required|integer|numeric')]
    public int $nis;

    #[Rule('required|date|date_format:Y-m-d')]
    public string $birthday = '';

    #[Rule('required|string|in:L,P|max:250')]
    public string $gender = '';

    #[Rule('required|string|max:250')]
    public string $classroom_id = '';

    public function mount(Student $student)
    {
        $this->authorize($this->permission);

        $this->id = $student->id;

        $this->name = $student->name;

        $this->nis = $student->nis;

        $this->birthday = $student->birthday->format('Y-m-d');

        $this->gender = $student->gender;

        $this->classroom_id = $student->classroom_id;
    }

    public function save()
    {
        $this->authorize($this->permission);

        $this->validate();

        $classroom = Classroom::findOrFail($this->classroom_id);

        $student = Student::findOrFail($this->id);

        $student->update([
            'classroom_id' => $classroom->id,
            'name' => $this->name,
            'nis' => $this->nis,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
        ]);

        $this->redirect(route('students.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.students.edit-student')->title($this->title);
    }
}
