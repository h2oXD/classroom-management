<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => request()->name,
                'email' => request()->email,
                'password' => Hash::make(request()->password),
                'role' => $request->role,
            ]);

            if ($user->role == '1') {
                //Nếu là sinh viên tạo sinh viên và tạo mã sinh viên
                do {
                    $studentCode = fake()->unique()->numerify('SV######');
                } while (Student::where('student_code', $studentCode)->exists());
                Student::create([
                    'user_id' => $user->id,
                    'student_code' => $studentCode,
                ]);
            } elseif ($user->role == '2') {
                //Nếu là giảng viên tạo giảng viên và tạo mã giảng viên
                do {
                    $teacherCode = fake()->unique()->numerify('GV######');
                } while (Teacher::where('teacher_code', $teacherCode)->exists());
                Teacher::create([
                    'user_id' => $user->id,
                    'teacher_code' => $teacherCode,
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Thêm mới người dùng thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('errors', 'Thêm mới người dùng KHÔNG thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
