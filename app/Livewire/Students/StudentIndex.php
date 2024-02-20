<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

// use OpenSpout\Common\Entity\Style\Style;
// use Rap2hpoutre\FastExcel\FastExcel;

class StudentIndex extends Component
{
    use WithPagination, Interactions;

    #[Url]
    public $search = '';

    public string $title = 'Siswa';

    public string $permission = 'index students';

    public function mount()
    {
        $this->authorize($this->permission);
    }

    // public function excel()
    // {
    //     return response()->streamDownload(function () {
    //         $data = collect([
    //             [
    //                 'Nama Lengkap' => 'Fulan',
    //                 'Nomor Induk Siswa' => '12345678',
    //                 'Tanggal Lahir' => '01/01/1997',
    //                 'Jenis Kelamin' => 'L',
    //                 'Kelas' => 'X-TKJ',
    //             ],
    //         ]);

    //         return (new FastExcel($data))->headerStyle((new Style())->setFontBold())->export('php://output');
    //     }, sprintf('students_upload_format.xlsx'));
    // }

    public function delete(Student $student)
    {
        $student->delete();

        $this->toast()->success('Berhasil!', 'Anda telah berhasil menghapus siswa bernama ' . $student->name . '.')->send();
    }

    public function render()
    {
        return view('livewire.students.student-index', [
            'students' => Student::with([
                'classroom'
            ])
            ->filter([
                'search' => $this->search
            ])
            ->orderByDesc('id')
            ->fastPaginate(5)
        ])->title($this->title);
    }
}
