@extends('layouts.master')
@section('title', 'Cập nhật môn học')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Cập nhật môn học</h2>
            <a href="{{ route('subjects.index') }}" class="btn btn-warning">Danh sách</a>
        </div>

        <!-- Kiểm tra xem có flash message không -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
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
        <form action="{{ route('subjects.update', $subject->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <label class="form-label" for="">Tên môn học</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $subject->name }}">
                </div>
                <div class="col-12 mt-2">
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>

    </div>
@endsection
