<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsCSVExport implements FromCollection, WithHeadings
{
    protected $standard;
    protected $division;

    public function __construct($standard, $division)
    {
        $this->standard = $standard;
        $this->division = $division;
    }

    public function collection()
    {
        $query = Student::query();

        if ($this->standard) {
            $query->where('standard', $this->standard);
        }

        if ($this->division) {
            $query->where('division', $this->division);
        }

        return $query->get(['id', 'stud_name', 'standard', 'division']);
    }

    public function headings(): array
    {
        return ['ID', 'Student Name', 'Standard', 'Division'];
    }
}
