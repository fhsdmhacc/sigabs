<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Result extends Component
{
    public string $title = 'Lihat Hasilmu';

    #[Locked]
    public $id;

    public $student;

    public $results;

    public function mount(Student $student)
    {
        $this->id = $student->id;

        $this->student = $student;

        $outcomes = Student::where('id', $student->id)
                            ->with([
                                'results' => function ($query) {
                                    $query->orderBy('total');
                                }
                            ])
                            ->first();

        if ($outcomes->results->get(2)->total - $outcomes->results->get(0)->total <= 4) {
            return $this->results = $outcomes->results->splice(0);
        }

        if ($outcomes->results->get(2)->total - $outcomes->results->get(1)->total <= 4) {
            return $this->results = $outcomes->results->splice(1);
        }

        return $this->results = $outcomes->results->splice(2);
    }

    public function render()
    {
        return view('livewire.result')->title($this->title);
    }
}
