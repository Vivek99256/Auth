<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
class DashboardController extends Controller
{
    public function dashboard()
{
    $totalStudents = Student::count(); // Get the total number of students
    return view('admin.dashboard', compact('totalStudents'));
}
}
