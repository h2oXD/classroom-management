<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\ClassroomSubject;
use App\Models\ConversationParticipant;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('admin', [AdminController::class, 'dashboard']);
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route cho Admin quản lý lớp học
    Route::resource('admin/students', StudentController::class);
    Route::resource('admin/teachers', TeacherController::class);
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/classrooms', ClassroomController::class);
    Route::resource('admin/subjects', SubjectController::class);
    Route::resource('admin/schedules', ScheduleController::class);
    // Route tự động phân lớp
    Route::get('admin/show-auto-assign', [ClassroomController::class, 'showAutoAssignStudents'])->name('classrooms.showAutoAssign');
    Route::post('admin/auto-assign', [ClassroomController::class, 'autoAssignStudents'])->name('classrooms.autoAssign');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    // Route cho giáo viên quản lý học sinh trong lớp của mình
    Route::get('/classrooms/{classroom}/students', [ClassroomController::class, 'listStudents'])->name('classrooms.students');
    Route::post('/classrooms/{classroom}/students/{student}/remove', [ClassroomController::class, 'removeStudent'])->name('classrooms.students.remove');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/classrooms', [StudentController::class, 'classrooms'])->name('student.classrooms');
    // Route cho học sinh đăng ký vào lớp học
    Route::get('/student/enroll', [StudentController::class, 'showEnrollForm'])->name('students.enroll.form');
    Route::post('/student/enroll', [StudentController::class, 'enroll'])->name('students.enroll');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('conversations', ConversationController::class);
    Route::get('chat/{conversationID}',[ConversationController::class,'index'])->name('chat.app');
    Route::post('conversations/{conversation}/messages', [MessageController::class, 'store'])->name('post.chat');
});
