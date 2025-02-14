<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection
{
    protected $section;
    protected $standard;
    protected $division;

    public function __construct($section, $standard, $division)
    {
        $this->section = $section;
        $this->standard = $standard;
        $this->division = $division;
    }

    public function collection()
    {
        $query = Student::query();

        if ($this->section) {
            $query->where('section', $this->section);
        }

        if ($this->standard) {
            $query->where('standard', $this->standard);
        }

        if ($this->division) {
            $query->where('division', $this->division);
        }

        return $query->get();
    }
}
