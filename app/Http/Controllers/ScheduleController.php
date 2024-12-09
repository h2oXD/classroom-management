<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Classroom;
use App\Models\ClassroomSubject;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW_ADMIN = 'admins.schedules.';
    public function index()
    {
        $schedules = Schedule::with('classroom')->get();
        return view(self::PATH_VIEW_ADMIN . __FUNCTION__,compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = ClassroomSubject::with('classroom')->get();
        return view(self::PATH_VIEW_ADMIN . __FUNCTION__, compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        Schedule::create($request->all());
        return redirect()->route('schedules.index')->with('success',true);
    }
}
