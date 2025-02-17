<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function dashboard()
    {
        $totalStudents = Student::count();
        $totalUsers = User::count();
        return view('admin.dashboard', compact('totalStudents', 'totalUsers'));
    }
}
