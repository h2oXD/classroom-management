@extends('layouts.master')
@section('title', 'Danh sách sinh viên')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách sinh viên</h2>
            <a href="{{ route('students.create') }}" class="btn btn-success">Thêm sinh viên</a>
        </div>

        <!-- Kiểm tra xem có flash message không -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Danh sách lớp học -->
        <div class="card">
            <div class="card-body">
                @if ($students->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã sinh viên</th>
                                <th>Họ và tên</th>
                                {{-- <th>Lớp đã đăng ký</th> --}}
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->student_code }}</td>
                                    <td>{{ $student->user->name }}</td>
                                    {{-- <td>{{ $student->classroom->name ?? 'Chưa có lớp' }}</td> --}}
                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}"
                                            class="btn btn-info btn-sm">Xem</a>
                                        <a href="{{ route('students.edit', $student->id) }}"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST"
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
                    {{$students->links()}}
                @else
                    <p class="text-center">Không có sinh viên nào.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
