@extends('layouts.master')
@section('title', 'Danh sách môn học')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách môn học</h2>
            <a href="{{ route('subjects.create') }}" class="btn btn-success">Thêm môn học</a>
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
                @if ($subjects->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên môn học</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->id }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->created_at }}</td>
                                    <td>{{ $subject->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('subjects.show', $subject->id) }}"
                                            class="btn btn-info btn-sm">Xem</a>
                                        <a href="{{ route('subjects.edit', $subject->id) }}"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST"
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
                    {{$subjects->links()}}
                @else
                    <p class="text-center">Không có môn học nào.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
