@extends('layouts.master')
@section('title', 'Thêm mới lớp học')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Thêm mới lớp học</h2>
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
                <form action="{{ route('classrooms.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label" for="">Tên lớp học</label>
                            <input type="text" name="name" id="" class="form-control"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="">Tên môn học</label>
                            <select class="form-select" name="subject_id" id="">
                                <option value="">Chọn môn học</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="">Giáo viên phụ trách</label>
                            <select class="form-select" name="teacher_id" id="">
                                <option value="">Chọn giáo viên</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">
                                        {{ $teacher->teacher_code }}({{ $teacher->user->name }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-2">
                            <button class="btn btn-success" type="submit">Thêm mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
