@extends('admin.dashboard.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <h2 class="text-center">Form update user</h2>
                </div>
                <form method="post" action="{{route('users.update', $user->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="username">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="{{$user->password}}" class="form-control" placeholder="password">
                        @if($errors->has('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="email">
                        @if($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Roles select</label>
                        @foreach($roles as $role)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="role[{{$role->id}}]"
                                           value="{{ $role->id }}"
                                           @foreach($user->roles as $roleUser)
                                           @if($roleUser->id === $role->id)
                                           checked
                                        @endif
                                        @endforeach> {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
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
