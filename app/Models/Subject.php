<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'teacher_id'
    ];

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_subject')->withPivot('teacher_id');
    }

    public function classroomSubjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }
}
