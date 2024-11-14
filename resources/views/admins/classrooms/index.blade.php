@extends('layouts.master')
@section('title', 'Quản lý lớp học')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Quản lý lớp học</h2>
            <a href="{{ route('classrooms.create') }}" class="btn btn-success">Thêm lớp học</a>
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
        <!-- Danh sách lớp học -->
        <div class="card">
            <div class="card-body">
                @if ($classrooms->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên lớp</th>
                                <th>Môn học</th>
                                <th>Giảng viên</th>
                                <th>Số lượng sinh viên</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td>
                                        {{ $classroom->subjects->pluck('name')->first() }}
                                    </td>
                                    <td>
                                        {{ $classroom->teachers->pluck('teacher_code')->first() }}
                                    </td>
                                    <td>
                                        {{ $classroom->enrollments_count }}
                                    </td>
                                    <td>
                                        <a href="{{ route('classrooms.show', $classroom->id) }}"
                                            class="btn btn-info btn-sm">Xem</a>
                                        <a href="{{ route('classrooms.edit', $classroom->id) }}"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST"
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
                    {{ $classrooms->links() }}
                @else
                    <p class="text-center">Không có lớp học nào.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
