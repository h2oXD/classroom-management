@extends('layouts.master')
@section('title', 'Cập nhật lớp học')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Cập nhật lớp học</h2>
            <a href="{{ route('classrooms.index') }}" class="btn btn-warning">Danh sách</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                Thao tác thành công
            </div>
        @endif
        @if (session('success') === false)
            <div class="alert alert-danger">
                Thao tác thất bại
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('classrooms.update', $classroom->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <label class="form-label" for="">Tên lớp học</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $classroom->name }}">
                </div>
                <div class="col-4">
                    <label class="form-label" for="">Tên môn học</label>
                    <select class="form-select" name="subject_id" id="">
                        <option value="">Chọn môn học</option>
                        @foreach ($subjects as $subject)
                            <option @selected($subject->id == $classroom->subjects[0]->id) value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label" for="">Giáo viên phụ trách</label>
                    <select class="form-select" name="teacher_id" id="">
                        <option value="">Chọn giáo viên</option>
                        @foreach ($teachers as $teacher)
                            <option @selected($teacher->user_id == $classroom->teachers()->pluck('user_id')->first()) value="{{ $teacher->id }}">{{ $teacher->teacher_code }}({{ $teacher->user->name }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>

    </div>
@endsection
