<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateStudent extends Component
{
    public string $title = 'Buat Siswa Baru';

    // public string $permission = 'create locations';

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

    public function mount()
    {
        // $this->authorize($this->permission);
    }

    public function save()
    {
        // $this->authorize($this->permission);

        $this->validate();

        Student::create([
            'uuid' => Str::uuid(),
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
        return view('livewire.students.create-student')->title($this->title);
    }
}
