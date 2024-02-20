<?php

namespace App\Livewire\Classrooms;

use App\Models\Classroom;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class ClassroomIndex extends Component
{
    use WithPagination, Interactions;

    #[Url]
    public $search = '';

    public string $title = 'Kelas';

    public string $permission = 'index classrooms';

    public function mount()
    {
        $this->authorize($this->permission);
    }

    public function delete(Classroom $classroom)
    {
        $classroom->delete();

        $this->toast()->success('Berhasil!', 'Anda telah berhasil menghapus kelas ' . $classroom->name . '.')->send();
    }

    public function render()
    {
        return view('livewire.classrooms.classroom-index', [
            'classrooms' => Classroom::with([
                'user',
            ])
            ->filter([
                'search' => $this->search
            ])
            ->orderByDesc('id')
            ->fastPaginate(5)
        ])->title($this->title);
    }
}
