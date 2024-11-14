<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW_ADMIN = 'admins.subjects.';
    public function index()
    {
        $subjects = Subject::latest()->paginate(10);
        return view(self::PATH_VIEW_ADMIN . __FUNCTION__, compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW_ADMIN . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        Subject::create($request->all());
        return redirect()->back()->with('success', 'Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return view(self::PATH_VIEW_ADMIN . __FUNCTION__, compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view(self::PATH_VIEW_ADMIN . __FUNCTION__, compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->all());
        return redirect()->back()->with('success', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->back()->with('success', 'Thao tác thành công');
    }
}
