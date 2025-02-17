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

    public function destroy($id)
{
    $document = Document::find($id);
    
    if (!$document) {
        return redirect()->back()->with('error', 'Document not found.');
    }

    // Delete the file from storage
    $filePath = public_path('uploads/documents/' . $document->file_name);
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    // Delete from database
    $document->delete();

    return redirect()->back()->with('success', 'Document deleted successfully.');
}


public function edit($id)
{
    $document = Document::find($id);

    if (!$document) {
        return redirect()->back()->with('error', 'Document not found.');
    }

    return view('admin.students.documentedit', compact('document')); // ✅ Update view path
}


public function update(Request $request, $id)
{
    $request->validate([
        'document_type' => 'required|string',
        'document_title' => 'required|string',
        'file_name' => 'nullable|mimes:pdf,jpg,png|max:2048'
    ]);

    $document = Document::find($id);

    if (!$document) {
        return redirect()->back()->with('error', 'Document not found.');
    }

    // Update fields
    $document->document_type = $request->document_type;
    $document->document_title = $request->document_title;

    // Handle file upload if a new file is provided
    if ($request->hasFile('file_name')) {
        // Delete old file
        if (file_exists(public_path('uploads/documents/' . $document->file_name))) {
            unlink(public_path('uploads/documents/' . $document->file_name));
        }

        // Store new file
        $file = $request->file('file_name');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/documents'), $fileName);
        $document->file_name = $fileName;
    }

    $document->save();

    return redirect()->route('students.document', $document->student_id)->with('success', 'Document updated successfully.');
}

}