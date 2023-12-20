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

    public $types;

    public $styles;

    public function mount(Student $student)
    {
        $this->id = $student->id;

        $this->student = $student->load([
            'results' => function ($query) {
                $query->selectRaw('count(value) as values_count, student_id, value')
                    ->groupBy('value')
                    ->orderByDesc('values_count');
            }
        ]);

        $result = $this->student->results->take(3);

        $this->types = Type::query()->get();

        if ($result->get(0)->values_count - $result->get(2)->values_count <= 4) {
            $this->styles = $this->types->whereIn('name', [$result->get(0)->value, $result->get(1)->value, $result->get(2)->value]);
        } elseif ($result->get(0)->values_count - $result->get(1)->values_count <= 4) {
            $this->styles = $this->types->whereIn('name', [$result->get(0)->value, $result->get(1)->value]);
        } else {
            $this->styles = $this->types->whereIn('name', [$result->get(0)->value]);
        }
    }

    public function render()
    {
        return view('livewire.result')->title($this->title);
    }
}
