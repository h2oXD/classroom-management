@extends('layouts.master')
@section('title', 'Chi tiết lớp - '.$classroom->name)
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Chi tiết lớp - {{$classroom->name}}</h2>
            <a href="{{ route('classrooms.index') }}" class="btn btn-warning">Danh sách</a>
        </div>
            <div class="row">
                <div class="col-12">
                    <label class="form-label" for="">Tên lớp học</label>
                    <input disabled type="text" name="name" id="" class="form-control" value="{{$classroom->name}}">
                </div>
                <div class="col-12 mt-2">
                    <label class="form-label" for="">Giáo viên</label>
                    <input disabled type="text" id="" class="form-control" value="{{$classroom->teachder->name ?? 'Chưa phân công'}}">
                </div>
            </div> 

    </div>
@endsection
