@extends('layouts.master')
@section('title', 'Chi tiết môn - '.$subject->name)
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Chi tiết môn - {{$subject->name}}</h2>
            <a href="{{ route('subjects.index') }}" class="btn btn-warning">Danh sách</a>
        </div>
            <div class="row">
                <div class="col-12">
                    <label class="form-label" for="">Tên môn học</label>
                    <input disabled type="text" name="name" id="" class="form-control" value="{{$subject->name}}">
                </div>
            </div> 

    </div>
@endsection
