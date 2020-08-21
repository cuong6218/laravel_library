@extends('admin.dashboard.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <h2 class="text-center">Form update books</h2>
                </div>
                <form method="post" action="{{route('books.update', $book->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Book name</label>
                        <input type="text" name="name" value="{{$book->name}}" class="form-control" placeholder="book name">
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
                                           value="{{ $type->id }}"
                                           @foreach($book->types as $typeBook)
                                           @if($typeBook->id === $type->id)
                                           checked
                                        @endif
                                        @endforeach> {{ $type->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>Author name</label>
                        <input type="text" name="author" value="{{$book->author}}" class="form-control" placeholder="author name">
                        @if($errors->has('author'))
                            <p class="text-danger">{{$errors->first('author')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" value="{{$book->price}}" class="form-control" placeholder="price">
                        @if($errors->has('price'))
                            <p class="text-danger">{{$errors->first('price')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" value="{{$book->amount}}" class="form-control" placeholder="amount">
                        @if($errors->has('amount'))
                            <p class="text-danger">{{$errors->first('amount')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" placeholder="description">{{$book->description}}</textarea>
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
