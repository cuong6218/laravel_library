@extends('admin.dashboard.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <h2 class="text-center">Form add product</h2>
                </div>
                <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Product name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="product name">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
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
                        <label>Quantity</label>
                        <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control" placeholder="quantity">
                        @if($errors->has('quantity'))
                            <p class="text-danger">{{$errors->first('quantity')}}</p>
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
                            <a href="{{route('products.back')}}" class="btn btn-danger">Back</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
@endsection
