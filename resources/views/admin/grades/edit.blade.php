@extends('admin.dashboard.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <h2 class="text-center">Form add grade</h2>
                </div>
                <form method="post" action="{{route('grades.update', $grade->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Grade name</label>
                        <input type="text" name="name" value="{{$grade->name}}" class="form-control" placeholder="grade name">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Teacher name</label>
                        <input type="text" name="teacher" value="{{$grade->teacher}}"  class="form-control" placeholder="teeacher name">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-1">
                            <a href="{{route('grades.back')}}" class="btn btn-danger">Back</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
@endsection
