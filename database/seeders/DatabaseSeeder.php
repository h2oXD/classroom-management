<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classroom;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hữu Hào',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
            'role' => '0',

        ]);
        // $subjects = ['PHP','Laravel','Giải tích 1','Chính trị','Giải tích 2','Pháp luật','Python','C++','C#','Java','JavaScript'];
        // b:foreach ($subjects as $subject) {
        //     Subject::create([
        //         'name' => $subject
        //     ]);
        // }
        // $teachers = User::where('role', '2')->get();
        // do {
        //     $teacherCode = fake()->unique()->numerify('GV######');
        // } while (Teacher::where('teacher_code', $teacherCode)->exists());

        // b:
        // foreach ($teachers as $teacher) {
        //     Teacher::create([
        //         'user_id' => $teacher->id,
        //         'teacher_code' => $teacherCode,
        //     ]);
        // }
        // Student::where('classroom_id',1)->update(['classroom_id' => null]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $arrs = [
        //     'Java cơ bản',
        //     'PHP1',
        //     'Laravel',
        //     'C#',
        //     'Khởi sự doanh nghiệp',
        //     'JavaScript'
        // ];
        // b:foreach ($arrs as $arr) {
        //     Classroom::create([
        //         'name' => $arr,
        //         'description' => fake()->text(20),
        //     ]);
        // }
        // $us = User::where('role','1')->get()->toArray();
        // foreach ($us as $u) {
        //     Student::create([
        //         'user_id' => $u['id'],
        //         'student_code' => fake()->unique()->numerify('######'),
        //         'classroom_id'=> rand(1,6),
        //     ]);
        // }

        // $this->call([
        // UserSeeder::class,
        // ClassroomSeeder::class,
        // StudentSeeder::class,
        // TeacherSeeder::class,
        // SubjectSeeder::class,
        // EnrollmentSeeder::class,
        // ScheduleSeeder::class,
        // GradeSeeder::class,
        // ]);

    }
}
