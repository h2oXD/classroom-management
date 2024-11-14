@extends('layouts.master')
@section('title', 'Danh sách giảng viên')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách giảng viên</h2>
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
                @if ($teachers->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã giảng viên</th>
                                <th>Họ và tên</th>
                                <th>Lớp được phân công</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->teacher_code }}</td>
                                    <td>{{ $teacher->user->name }}</td>
                                    <td>
                                        @if (!$teacher->classrooms()->first())
                                            Chưa được phân công
                                        @endif
                                        @foreach ($teacher->classrooms as $classroom)
                                            {{$classroom->name}}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('teachers.show', $teacher->id) }}"
                                            class="btn btn-info btn-sm">Xem</a>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
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
                    {{ $teachers->links() }}
                @else
                    <p class="text-center">Không có giảng viên nào.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
