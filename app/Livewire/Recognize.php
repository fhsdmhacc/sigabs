<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Result;
use App\Models\Student;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Recognize extends Component
{
    public string $title = 'Kenali dirimu';

    public int $step = 1;

    #[Locked]
    public $id;

    public $student;

    public $questions;

    public $test_1 = '';

    public $test_2 = '';

    public $test_3 = '';

    public $test_4 = '';

    public $test_5 = '';

    public $test_6 = '';

    public $test_7 = '';

    public $test_8 = '';

    public $test_9 = '';

    public $test_10 = '';

    public $test_11 = '';

    public $test_12 = '';

    public $test_13 = '';

    public $test_14 = '';

    public $test_15 = '';

    public $test_16 = '';

    public $test_17 = '';

    public $test_18 = '';

    public $test_19 = '';

    public $test_20 = '';

    public $test_21 = '';

    public $test_22 = '';

    public $test_23 = '';

    public $test_24 = '';

    public $test_25 = '';

    public $test_26 = '';

    public $test_27 = '';

    public $test_28 = '';

    public $test_29 = '';

    public $test_30 = '';

    public function mount(Student $student)
    {
        $this->id = $student->id;

        $this->student = $student;

        $this->questions = Question::with('options')->get();

        $results = Result::where('student_id', $student->id)->get();

        foreach ($results as $result) {
            $this->{'test_' . $result->question_id} = $result->value;
        }
    }

    public function prev()
    {
        $this->step--;
    }

    public function next()
    {
        $this->validate(
            [
                'test_' . $this->step => 'required|string|max:250'
            ],
            [
                'test_' . $this->step . '.required' => 'Silakan pilih salah satu sebelum melanjutkan.'
            ]
        );

        Result::updateOrCreate(
            [
                'student_id' => $this->student->id,
                'question_id' => $this->step,
            ],
            [
                'student_id' => $this->student->id,
                'question_id' => $this->step,
                'value' => $this->{'test_' . $this->step},
            ]
        );

        if ($this->step == 30) {
            return $this->redirect(route('result', $this->student->uuid), navigate: true);
        }

        $this->step++;
    }

    public function render()
    {
        return view('livewire.recognize')->title($this->title);
    }
}
