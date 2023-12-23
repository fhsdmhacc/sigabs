<?php

namespace App\Livewire\Students;

use App\Jobs\StudentImportProcess;
use Illuminate\Support\Facades\Bus;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Rap2hpoutre\FastExcel\FastExcel;

class StudentUpload extends Component
{
    use WithFileUploads;

    public string $title = 'Unggah Siswa';

    // public string $permission = 'create locations';

    #[Rule('required|mimes:xlsx,xls|max:2000')]
    public $document;

    public function mount()
    {
        // $this->authorize($this->permission);
    }

    public function save()
    {
        // $this->authorize($this->permission);

        $this->validate();

        $jobs = collect([]);

        (new FastExcel())->sheet(1)->import($this->document->getRealPath(), function ($line) use ($jobs) {
            $jobs->push(new StudentImportProcess($line));
        });

        Bus::batch($jobs)->name('Impor Siswa')->dispatch();

        $this->document->delete();

        $this->redirect(route('students.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.students.student-upload')->title($this->title);
    }
}
