<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'classroom_subject')->withPivot('teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'classroom_subject')->withPivot('subject_id');
    }
    public function teacherUsers()
    {
        return $this->belongsToMany(User::class, 'classroom_subject', 'classroom_id', 'teacher_id');
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
