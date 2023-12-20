<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Verification extends Component
{
    use Interactions;

    public string $title = 'Verifikasi dirimu';

    public $classes;

    #[Rule('required|integer|numeric')]
    public $identification_number = '';

    #[Rule('required|date|date_format:Y-m-d')]
    public $birthday = '';

    #[Rule('required|string|max:250')]
    public $class = '';

    public function mount()
    {
        $this->classes = Student::distinct('class')->get([
            'class as label',
            'class as value'
        ])
        ->toArray();
    }

    public function save()
    {
        $this->validate();

        $student = Student::firstWhere([
            [
                'identification_number', $this->identification_number
            ],
            [
                'birthday', $this->birthday
            ],
            [
                'class', $this->class
            ]
        ]);

        if ($student) {
            return $this->redirect(route('recognize', $student->uuid), navigate: true);
        }

        $this->toast()->error('Gagal!', 'Maaf, Anda tidak terdaftar sebagai siswa/i SMK Fadilah');
    }

    public function render()
    {
        return view('livewire.verification')->title($this->title);
    }
}
