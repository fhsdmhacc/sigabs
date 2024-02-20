<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\Type;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Result extends Component
{
    public string $title = 'Lihat Hasilmu';

    #[Locked]
    public $id;

    public $student;

    public $types;

    public $results;

    public function mount(Student $student)
    {
        $this->id = $student->id;

        $this->student = $student;

        $this->types = Type::get();

        $selected = [
            [
                'value' => $student->result->visual,
                'variable' => 'Visual'
            ],
            [
                'value' => $student->result->auditory,
                'variable' => 'Auditori'
            ],
            [
                'value' => $student->result->kinesthetic,
                'variable' => 'Kinestetik'
            ]
        ];

        usort($selected, function ($a, $b) {
            return $a['value'] - $b['value'];
        });

        if ($selected[2]['value'] - $selected[0]['value'] <= 4) {
            return $this->results = array_slice(array_reverse($selected), 0, 3);
        }

        if ($selected[2]['value'] - $selected[1]['value'] <= 4) {
            return $this->results = array_slice(array_reverse($selected), 0, 2);
        }

        return $this->results = array_slice(array_reverse($selected), 0, 1);
    }

    public function render()
    {
        return view('livewire.result')->title($this->title);
    }
}
