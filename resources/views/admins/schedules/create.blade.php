@extends('layouts.master')
@section('title', 'Thêm mới thời khoá biểu')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Thêm mới thời khoá biểu</h2>
                    <a href="{{ route('schedules.index') }}" class="btn btn-warning">Danh sách</a>
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
                <form action="{{ route('schedules.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label for="classroom_id">Lớp học:</label>
                            <select class="form-select" name="classroom_id" required>
                                @foreach ($classrooms as $classroom)    
                                    <option value="{{ $classroom->classroom->id }}">{{ $classroom->classroom->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="day_of_week">Ngày trong tuần:</label>
                            <select class="form-select" name="day_of_week" required>
                                <option value="Monday">Thứ Hai</option>
                                <option value="Tuesday">Thứ Ba</option>
                                <option value="Wednesday">Thứ Tư</option>
                                <option value="Thursday">Thứ Năm</option>
                                <option value="Friday">Thứ Sáu</option>
                                <option value="Saturday">Thứ Bảy</option>
                                <option value="Sunday">Chủ Nhật</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="start_time">Giờ bắt đầu:</label>
                            <input class="form-control" type="time" name="start_time" required>
                        </div>
                        <div class="col-2">
                            <label for="end_time">Giờ kết thúc:</label>
                            <input class="form-control" type="time" name="end_time" required>
                        </div>
                        <div class="col-2">
                            <label for="end_time">Phòng học</label>
                            <input class="form-control" type="text" name="location" required>
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
