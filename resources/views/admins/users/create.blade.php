@extends('layouts.master')
@section('title', 'Thêm mới người dùng')
@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Thêm mới người dùng</h2>
            {{-- <a href="{{ route('classrooms.index') }}" class="btn btn-warning">Danh sách</a> --}}
        </div>

        <!-- Kiểm tra xem có flash message không -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('errors'))
            <div class="alert alert-danger">
                {{ session('errors') }}
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
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label class="form-label" for="">Tên người dùng</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="col-12 mt-2">
                    <label class="form-label" for="">Email</label>
                    <input type="email" name="email" id="" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="col-12 mt-2">
                    <label class="form-label" for="">Mật khẩu</label>
                    <input type="password" name="password" id="" class="form-control" value="{{ old('password') }}">
                </div>
                <div class="col-12 mt-2">
                    <label class="form-label" for="">Vai trò</label>
                    <select class="form-select" name="role" id="">
                        <option selected value="0">Admin</option>
                        <option value="2">Teacher</option>
                        <option value="1">Student</option>
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
