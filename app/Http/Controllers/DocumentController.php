<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{
    public function index(Request $request,$id)
    {
        $student = Student::findOrFail($id); // Fetch the student
        $documents = Document::where('student_id', $id)->get();

        return view('admin.students.document', compact('student', 'documents'));
    }



    public function store(Request $request)
    {
       // Log::info('Store function reached.');

        $request->validate([
            'document_type' => 'required|string|max:255',
            'document_title' => 'required|string|max:255',
            'file_name' => 'required|file|mimes:pdf,jpg,png,jpeg|max:2048',
            'student_id' => 'required|exists:students,id'
        ]);

     //   Log::info('Validation passed.');

        if ($request->hasFile('file_name')) {
            $file = $request->file('file_name');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/documents'), $filename);

          Log::info('File uploaded: ' . $filename);
        } else {
           Log::error('File upload failed.');
            return back()->with('error', 'File upload failed.');
        }

        $document = Document::create([
            'student_id' => $request->student_id,
            'document_type' => $request->document_type,
            'document_title' => $request->document_title,
            'file_name' => $filename,
        ]);

       Log::info('Insert attempted.');

        if ($document) {
            //Log::info('Document saved successfully:', $document->toArray());
            return redirect()->route('students.document', ['id' => $request->student_id])->with('success', 'Data inserted successfully.');
        } else {
            //log::error('Failed to save document.');
            return response()->json(['message' => 'Failed to store document.'], 500);
        }
    }
}