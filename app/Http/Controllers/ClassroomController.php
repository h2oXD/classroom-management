<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\ClassroomSubject;
use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admins.classrooms.';
    public function index()
    {
        $classrooms = Classroom::with(['teachers', 'subjects'])->withCount('enrollments')->paginate(10);
        return view(self::PATH_VIEW . __FUNCTION__, compact(['classrooms']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        $teachers = Teacher::with('user')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact([
            'subjects',
            'teachers'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request)
    {
        try {
            DB::beginTransaction();

            $classroom = Classroom::create([
                'name' => $request->name,
            ]);

            do {
                $classroom_code = fake()->unique()->numerify('CLR######');
            } while (ClassroomSubject::where('classroom_code', $classroom_code)->exists());

            // dd($request->teacher_id);
            ClassroomSubject::insert([
                'classroom_id' => $classroom->id,
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
                'classroom_code' => $classroom_code
            ]);
            
            Conversation::create([
                'classroom_id' => $classroom->id,
                'title' => $classroom->name,
            ]);

            DB::commit();

            return redirect(route('classrooms.index'))->with('success', true);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('classrooms.index'))->with('success', false);
        }

    }
    public function show(Classroom $classroom)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        $classroom->with(['subjects', 'teachers']);
        $subjects = Subject::all();
        $teachers = Teacher::with('user')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact([
            'subjects',
            'teachers',
            'classroom'
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        try {
            DB::beginTransaction();
            $classroom->update([
                'name' => $request->name,
            ]);
            ClassroomSubject::where('classroom_id', $classroom->id)->update([
                'classroom_id' => $classroom->id,
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
            ]);
            DB::commit();
            return redirect(route('classrooms.edit', $classroom))->with('success', true);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('classrooms.edit', $classroom))->with('success', false);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classrooms.index')->with('success', 'Lớp học đã bị xóa.');
    }

    public function showAutoAssignStudents()
    {
        $studentNullClass = $students = Student::doesntHave('enrollments')->get();
        $classrooms = Classroom::withCount('enrollments')->get();
        return view('admins.classrooms.auto-assign', compact(['studentNullClass', 'classrooms']));
    }
    public function autoAssignStudents()
    {
        try {
            DB::beginTransaction();

            $students = Student::doesntHave('enrollments')->get();
            $classrooms = Classroom::withCount('enrollments')->get();

            foreach ($students as $student) {
                $classroom = $classrooms->firstWhere('enrollments_count', '<', 30);

                if ($classroom) {
                    $classroom->enrollments_count += 1;

                    Enrollment::insert([
                        'student_id' => $student->id,
                        'classroom_id' => $classroom->id,
                        'enrollment_date' => now(),
                        'status' => 'approved'
                    ]);

                    $conversationID = Conversation::where('classroom_id',$classroom->id)->first();
                    // dd($student->user->id);
                    ConversationParticipant::insert([
                        'user_id' => $student->user->id,
                        'conversation_id' => $conversationID->id,
                    ]);

                } else {
                    break;
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Phân lớp tự động thành công.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('errors', 'Phân lớp tự động KHÔNG thành công.');
        }

    }

    // public function listStudents(Classroom $classroom)
    // {
    //     $students = $classroom->students;
    //     return view('classrooms.students', compact('students'));
    // }

    // public function removeStudent(Classroom $classroom, Student $student)
    // {
    //     $student->classroom_id = null;
    //     $student->save();
    //     return redirect()->back()->with('success', 'Học sinh đã được xóa khỏi lớp.');
    // }
}
