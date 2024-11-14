@extends('layouts.master')
@section('title', 'Quản lý thời khoá biểu')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Quản lý thời khoá biểu</h2>
            <a href="{{ route('schedules.create') }}" class="btn btn-success">Thêm thời khoá biểu</a>
        </div>

        <!-- Kiểm tra xem có flash message không -->
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
        <div class="card">
            <div class="card-body">
                @if ($schedules->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Lớp học</th>
                                {{-- <th>Môn học</th> --}}
                                <th>Phòng học</th>
                                <th>Ngày trong tuần</th>
                                <th>Giờ bắt đầu</th>
                                <th>Giờ kết thúc</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->id }}</td>
                                    <td>{{ $schedule->classroom->name }}</td>
                                    {{-- <td>{{ $schedule->classroomSubject->id }}</td> --}}
                                    <td>{{ $schedule->location }}</td>
                                    <td>{{ $schedule->day_of_week }}</td>
                                    <td>{{ $schedule->start_time }}</td>
                                    <td>{{ $schedule->end_time }}</td>
                                    <td>
                                        <a href="{{ route('schedules.show', $schedule->id) }}"
                                            class="btn btn-info btn-sm">Xem</a>
                                        <a href="{{ route('schedules.edit', $schedule->id) }}"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $schedules->links() }} --}}
                @else
                    <p class="text-center">Không có lịch học nào.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
