@extends('admin.dashboard.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <h2 class="text-center">Form update student</h2>
                </div>
                <form method="post" action="{{route('students.update', $student->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Student name</label>
                        <input type="text" name="name" value="{{$student->name}}" class="form-control" placeholder="student name">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Grade select</label>
                        <select name="grade_id" class="form-control">
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date of birth</label>
                        <input type="date" name="birth" value="{{$student->birth}}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{$student->phone}}" class="form-control" placeholder="phone">
                        @if($errors->has('phone'))
                            <p class="text-danger">{{$errors->first('phone')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{$student->email}}" class="form-control" placeholder="email">
                        @if($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="address">{{$student->address}}</textarea>
                        @if($errors->has('address'))
                            <p class="text-danger">{{$errors->first('address')}}</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-1">
                            <a href="{{route('students.back')}}" class="btn btn-danger">Back</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
@endsection
