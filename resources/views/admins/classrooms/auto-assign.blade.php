@extends('layouts.master')
@section('title', 'Xếp lớp')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Xếp lớp</h2>
                    <a href="{{ route('classrooms.index') }}" class="btn btn-warning">Danh sách</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        Thao tác thành công
                    </div>
                @endif
                @if (session('errors'))
                    <div class="alert alert-danger">
                        Thao tác thất bại
                    </div>
                @endif

                <form action="{{ route('classrooms.autoAssign') }}" method="post">
                    @csrf
                     <button class="btn btn-danger mb-2" type="submit">Tự động xếp lớp</button>
                </form>
                <div class="row">
                    <div class="col-6">
                        <h3 class="my-2">Danh sách lớp</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên lớp</th>
                                    <th>Số lượng sinh viên</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classrooms as $class)
                                    <tr>
                                        <td>{{ $class->id }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->enrollments_count }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <h3 class="my-2">Danh sinh viên chưa có lớp</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã sinh viên</th>
                                    <th>Họ và tên</th>
                                    <th>Lớp học</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentNullClass as $student)
                                    <tr>
                                        <td>{{ $student->user_id }}</td>
                                        <td>{{ $student->student_code }}</td>
                                        <td>{{ $student->user->name }}</td>
                                        <td>Chưa có</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $studentNullClass->links() }} --}}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
