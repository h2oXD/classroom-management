<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomSubject extends Model
{
    use HasFactory;
    protected $table = 'classroom_subject';
    public $timestamps = false;
    // protected $primaryKey = ['classroom_id', 'subject_id'];
    // public $incrementing = false; // Khóa chính không tự động tăng
    // protected $keyType = 'string'; // Kiểu dữ liệu của khóa chính
    protected $fillable = [
        'classroom_id', 
        'subject_id',
        'teacher_id',
        'classroom_code'
    ];   
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
