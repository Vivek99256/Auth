<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all()->map(function ($student) {
            $student->birthdate = $student->birthdate ? Carbon::parse($student->birthdate)->format('d-m-Y') : null;
            return $student;
        });
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

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

    public function edit($id)
{
    $student = Student::findOrFail($id); // Fetch student by ID
    return view('admin.students.edit', compact('student')); // Correct path
}



    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');

    }
}
