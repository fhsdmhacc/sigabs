<?php

namespace App\Jobs;

use App\Models\Student;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;

class StudentImportProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected array $line,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Validator::make($this->line, [
            'Nama Lengkap' => 'required|string|max:250',
            'Nomor Induk Siswa' => 'required|integer|numeric',
            'Tanggal Lahir' => 'required|date|date_format:Y-m-d',
            'Jenis Kelamin' => 'required|string|in:L,P|max:250',
            'Kelas' => 'required|string|max:250',
        ]);

        $student = Student::firstWhere([
            [
                'identification_number', $this->line['Nomor Induk Siswa']
            ],
            [
                'birthday', $this->line['Tanggal Lahir']
            ],
            [
                'class', $this->line['Kelas']
            ]
        ]);

        if (! $student) {
            $student = new Student();
            $student->uuid = Str::uuid();
            $student->identification_number = $this->line['Nomor Induk Siswa'];
            $student->birthday = $this->line['Tanggal Lahir'];
            $student->class = $this->line['Kelas'];
        }

        $student->name = $this->line['Nama Lengkap'];
        $student->gender = $this->line['Jenis Kelamin'];
        $student->save();
    }

    /**
     * Handle a job failure.
     */
    public function failed(Throwable $exception): void
    {
        Log::error('Failed Job', [
            'message' => $exception->getMessage(),
            'batch' => $this->batch()->id,
        ]);
    }
}
