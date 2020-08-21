@extends('admin.dashboard.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <h2 class="text-center">Form add book</h2>
                </div>
                <form method="post" action="{{route('books.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Book name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="book name">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Types select</label>
                        @foreach($types as $type)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="type[{{$type->id}}]"
                                           value="{{ $type->id }}"> {{ $type->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>Author name</label>
                        <input type="text" name="author" value="{{old('author')}}" class="form-control" placeholder="author name">
                        @if($errors->has('author'))
                            <p class="text-danger">{{$errors->first('author')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="price">
                        @if($errors->has('price'))
                            <p class="text-danger">{{$errors->first('price')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" value="{{old('amount')}}" class="form-control" placeholder="amount">
                        @if($errors->has('amount'))
                            <p class="text-danger">{{$errors->first('amount')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" placeholder="description">{{old('description')}}</textarea>
                        @if($errors->has('description'))
                            <p class="text-danger">{{$errors->first('description')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-1">
                            <a href="{{route('books.back')}}" class="btn btn-danger">Back</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
@endsection
