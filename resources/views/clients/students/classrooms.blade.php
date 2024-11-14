@extends('layouts.master')
@section('title', 'Student')
@section('content')
    <div class="container mt-3">
        @foreach ($classrooms as $classroom)
        <div class="card">
            <div class="card-body">
                <a href="#!" class="text-muted float-end mt-n1 fs-18"><i class="ti ti-external-link"></i></a>
                <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Lớp</h5>
                <div class="d-flex align-items-center gap-2 my-3">
                    <div class="avatar-md flex-shrink-0">
                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                            <i class="ti ti-users"></i>
                        </span>
                    </div>
                    <h3 class="mb-0 fw-bold">{{$classroom->name}}</h3>
                </div>
                <p class="mb-1">
                    <span class="text-primary me-1"><i class="ti ti-minus"></i></span>
                    <span class="text-nowrap text-muted">Giảng viên</span>
                    <span class="ms-1"><b>{{$classroom->teachers->pluck('teacher_code')->first()}}</b></span>
                </p>
                <p class="mb-0">
                    <span class="text-primary me-1"><i class="ti ti-minus"></i></span>
                    <span class="text-nowrap text-muted">Môn học</span>
                    <span class="ms-1"><b>{{$classroom->subjects()->pluck('name')->first()}}</b></span>
                </p>
            </div>
        </div>
        @endforeach
    </div>
@endsection
