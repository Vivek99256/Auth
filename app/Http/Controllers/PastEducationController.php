<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PastEducation;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class PastEducationController extends Controller
{
    public function index(Request $request,$id)
    {
        $student = Student::findOrFail($id); // Fetch the student
        $documents = Document::where('student_id', $id)->get();

        return view('admin.students.past', compact('student', 'past'));
    }
    public function create($id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id); 

        // Pass the student to the Blade file
        return view('past', compact('student'));
    }

    public function store(Request $request)
{
    Log::info('Validated Data:', $request->all()); // Log incoming data

    $validatedData = $request->validate([
        'medium' => 'required|string',
        'name_of_board' => 'required|string',
        'year' => 'required|integer',
        'percentage' => 'required|integer',
        'school_name' => 'required|string',
        'place' => 'required|string',
        'trial' => 'nullable|string',
        'student_id' => 'required|exists:students,id', // Ensure student exists
    ]);

    $pastEducation = new PastEducation();
    $pastEducation->fill($validatedData);
    $pastEducation->student_id = $request->input('student_id'); // Explicitly setting student_id
    $pastEducation->save();

    Log::info('Data saved successfully:', $pastEducation->toArray());

    return redirect()->back()->with('success', 'Data saved successfully!');
}
    

}
