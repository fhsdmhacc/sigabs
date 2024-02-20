<?php

namespace App\Livewire;

use App\Models\Result;
use App\Models\Student;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public string $title = 'Beranda';

    public function render()
    {
        $results = Result::with([
            'student',
            'student.classroom',
        ])
        ->orderByDesc('id')
        ->fastPaginate(5);

        $students = Student::count();

        $teachers = User::with('roles')->whereRelation('roles', 'name', 'Teacher')->count();

        return view('livewire.home', [
            'test_completed' => $results->total(),
            'test_uncompleted' => $students - $results->total(),
            'teacher' => $teachers,
            'student' => $students,
            'results' => $results,
        ])->title(
            $this->title
        );
    }
}
