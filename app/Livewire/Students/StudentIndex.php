<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use OpenSpout\Common\Entity\Style\Style;
use Rap2hpoutre\FastExcel\FastExcel;

class StudentIndex extends Component
{
    use WithPagination;

    public string $title = 'Siswa';

    // public string $permission = 'index locations';

    public function mount()
    {
        // $this->authorize($this->permission);
    }

    public function excel()
    {
        return response()->streamDownload(function () {
            $data = collect([
                [
                    'Nama Lengkap' => 'Fulan',
                    'Nomor Induk Siswa' => '12345678',
                    'Tanggal Lahir' => '01/01/1997',
                    'Jenis Kelamin' => 'L',
                    'Kelas' => 'X-TKJ',
                ],
            ]);

            return (new FastExcel($data))->headerStyle((new Style())->setFontBold())->export('php://output');
        }, sprintf('students_upload_format.xlsx'));
    }

    public function render()
    {
        return view('livewire.students.student-index', [
            'students' => Student::fastPaginate(5)
        ])->title($this->title);
    }
}
