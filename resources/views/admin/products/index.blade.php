@extends('admin.dashboard.master')
@section('content')
    <head>
        <meta name="_token" content="{{ csrf_token() }}">
    </head>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('products.create')}}" class="btn btn-success">Add product</a>
                </div>
                <div class="form-inline col-md-2 my-2 my-lg-0">
                    <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                            <h1 class="text-center">List Product</h1>
                    </div>
                </div>
            <table class="table text-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col" colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse($products as $key => $product)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->description}}</td>
                            <td><img src="{{asset('storage/'.$product->image)}}" style="width: 50px; height: 50px" alt="No image"></td>
                            <td><a href="{{route('products.edit', $product->id)}}" class="btn btn-info"><span data-feather="arrow-up-circle"></span>&nbsp;Update</a> </td>
                            <td>
                                <form method="post" action="{{route('products.destroy', $product->id)}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger"><span data-feather="trash-2"></span>&nbsp;Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{$products->links()}}
        </div>
    </div>
@endsection
