<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\PastEducation;
use App\Exports\StudentsExport;
use App\Exports\StudentsCSVExport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = Student::all()->map(function ($student) {
            $student->birthdate = $student->birthdate ? Carbon::parse($student->birthdate)->format('d-m-Y') : null;
            return $student;
        });

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stud_name' => 'required|string|max:255',
            'mid_name' => 'nullable|string|max:255',
            'surname' => 'required|string|max:255',
            'stud_mobile_no' => 'required|string|max:15',
            'birthdate' => 'required|date',
            'father_mobile_no' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
            'section' => 'required|string|max:255',
            'standard' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'quota' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'caste' => 'required|string|max:255',
            'blood_group' => 'required|string|max:255',
            'adhar_no' => 'required|string|max:20',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);
    // echo "<pre>";print_r($id);exit;
    $validatedData = Validator::make($request->all(),[
        'stud_name' => 'required|string|max:255',
        'mid_name' => 'nullable|string|max:255',
        'surname' => 'required|string|max:255',
        'stud_mobile_no' => 'required|string|max:15',
        'birthdate' => 'required|date',
        'father_mobile_no' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'address' => 'required|string',
        'state' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'pincode' => 'required|string|max:10',
        'religion' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if ($validatedData->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'validation error',
            'errors' => $validatedData->errors()
        ], 401);
    } 

    $updateArr = [
        'stud_name' =>$request->stud_name,
        'mid_name' => $request->mid_name,
        'surname' => $request->surname,
        'stud_mobile_no' => $request->stud_mobile_no,
        'birthdate' => $request->birthdate,
        'father_mobile_no' => $request->father_mobile_no,
        'email' => $request->email,
        'address' => $request->address,
        'state' => $request->state,
        'city' => $request->city,
        'pincode' => $request->pincode,
        'religion' => $request->religion,
    ];
    // Handle photo upload
    if ($request->hasFile('photo')) {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo); // Delete old photo
        }
        $path = $request->file('photo')->store('photos', 'public');
        $updateArr['photo'] = $path;
    }

    // $student->update($updateArr);
    Student::where('id',$id)->update($updateArr);
    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}

public function pastEducation($id)
{
    $student = Student::findOrFail($id);
    return view('admin.students.past', compact('student'));
}


public function editPast(Student $student)
    {
        $pastEducationRecords = PastEducation::where('student_id', $student->id)->get();
        return view('students.past', compact('student', 'pastEducationRecords'));
    }

    public function storePastEducation(Request $request, Student $student)
    {
        $request->validate([
            'previous_school' => 'required|string|max:255',
            'last_standard'   => 'required|string|max:255',
            'percentage'      => 'required|string|max:10',
            'board'           => 'required|string|max:255',
        ]);

        PastEducation::create([
            'student_id'      => $student->id,
            'previous_school' => $request->previous_school,
            'last_standard'   => $request->last_standard,
            'percentage'      => $request->percentage,
            'board'           => $request->board,
        ]);

        return redirect()->route('students.past', $student->id)->with('success', 'Past education details saved.');
    }



    public function showPastEducation($id)
    {
        $student = Student::findOrFail($id);
        $pastEducationRecords = PastEducation::where('student_id', $id)->get();
    
        return view('admin.students.past', compact('student', 'pastEducationRecords'));
    }

    public function destroyPastEducation($studentId, $pastEducationId)
{
    $pastEducation = PastEducation::findOrFail($pastEducationId);
    $pastEducation->delete();

    return redirect()->back()->with('success', 'Past education record deleted successfully.');
}

//studentreport

public function reportPage()
{
    $students = Student::all(); // Fetch all student records
    return view('student_report', compact('students'));
}
 
public function reportSearch(Request $request) {
    $section = $request->section;
    $standard = $request->standard;
    $division = $request->division;

    $students = Student::when($section, function ($q) use ($section) {
        $q->where('section', $section);
    })
    ->when($standard, function ($q) use ($standard) {
        $q->where('standard', $standard);
    })
    ->when($division, function ($q) use ($division) {
        $q->where('division', $division);
    })
    ->get();

    return view('admin.students.student_report', compact('students'));
}

public function generatePDF(Request $request)
    {
        // Get filter values
        $section = $request->query('section');
        $standard = $request->query('standard');
        $division = $request->query('division');

        // Fetch students based on search filters
        $students = Student::query();

        if ($section) {
            $students->where('section', $section);
        }

        if ($standard) {
            $students->where('standard', $standard);
        }

        if ($division) {
            $students->where('division', $division);
        }

        $students = $students->get();

        // Load PDF view with filtered data
        $pdf = Pdf::loadView('admin.students.pdf', compact('students'));

        return $pdf->download('student_report.pdf');
    }

    public function downloadExcel(Request $request)
{
    $section = $request->query('section');
    $standard = $request->query('standard');
    $division = $request->query('division');

    return Excel::download(new StudentsExport($section, $standard, $division), 'students.xlsx');
}

public function exportCSV(Request $request)
{
    $standard = $request->input('standard');
    $division = $request->input('division');

    return Excel::download(new StudentsCSVExport($standard, $division), 'students.csv', \Maatwebsite\Excel\Excel::CSV);
}

    
    
}
