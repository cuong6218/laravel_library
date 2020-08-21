@extends('admin.dashboard.master')
@section('content')

    <div class="container">
    <div id="message_create_type"></div>
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                    <h2 class="text-center">Form add type</h2>
            </div>
            <form method="post" action="{{route('types.store')}}">
                @csrf
                <div class="form-group">
                    <label>Type name</label>
                    <input type="text" name="name" id="type_name" value="{{old('name')}}" class="form-control" placeholder="type name">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" id="type_store">Submit</button>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-1">
                        <a href="{{route('types.back')}}" class="btn btn-danger">Back</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
