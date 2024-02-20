<?php

namespace App\Livewire\Students;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateStudent extends Component
{
    public string $title = 'Buat Siswa Baru';

    public string $permission = 'create students';

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

    public function mount()
    {
        $this->authorize($this->permission);
    }

    public function save()
    {
        $this->authorize($this->permission);

        $this->validate();

        $classroom = Classroom::findOrFail($this->classroom_id);

        Student::create([
            'uuid' => Str::uuid(),
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
        return view('livewire.students.create-student')->title($this->title);
    }
}
