<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    public function dashboard()
    {
        dd(1);
    }
    public function index()
    {
        $teachers = Teacher::with(['user', 'classrooms'])->latest()->paginate(10);
        return view('admins.teachers.index', compact('teachers'));
    }
}
