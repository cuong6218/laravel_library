@extends('admin.dashboard.master')
@section('content')
    <head>
        <meta name="_token" content="{{ csrf_token() }}">
    </head>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('books.create')}}" class="btn btn-success">Add book</a>
                </div>
                <div class="form-inline col-md-2 my-2 my-lg-0">
                    <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                            <h1 class="text-center">List Book</h1>
                    </div>
                </div>
            <table class="table text-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Types</th>
                    <th scope="col">Author</th>
                    <th scope="col">Price</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col" colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse($books as $key => $book)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$book->name}}</td>
                            <td>
                                @foreach($book->types as $type)
                                    {{$type->name}}<br/>
                                @endforeach
                            </td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->price}}</td>
                            <td>{{$book->amount}}</td>
                            <td>{{$book->description}}</td>
                            <td><img src="{{asset('storage/'.$book->image)}}" style="width: 50px; height: 50px" alt="No image"></td>
                            <td><a href="{{route('books.edit', $book->id)}}" class="btn btn-info"><span data-feather="arrow-up-circle"></span>&nbsp;Update</a> </td>
                            <td>
                                <form method="post" action="{{route('books.destroy', $book->id)}}">
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
            {{$books->links()}}
        </div>
    </div>
@endsection
