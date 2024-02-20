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

    #[Rule('required|integer|numeric')]
    public int $nis;

    #[Rule('required|date|date_format:Y-m-d')]
    public $birthday = '';

    #[Rule('required|max:250')]
    public $classroom_id = '';

    public function save()
    {
        $this->validate();

        $student = Student::firstWhere([
            [
                'classroom_id', $this->classroom_id
            ],
            [
                'nis', $this->nis
            ],
            [
                'birthday', $this->birthday
            ]
        ]);

        if ($student) {
            return $this->redirect(route('recognize', $student->uuid), navigate: true);
        }

        $this->toast()->error('Gagal!', 'Maaf, Anda tidak terdaftar sebagai siswa/i SMK Fadilah')->send();
    }

    public function render()
    {
        return view('livewire.verification')->title($this->title);
    }
}
