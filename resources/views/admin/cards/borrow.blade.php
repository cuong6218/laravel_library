@extends('admin.dashboard.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <h2 class="text-center">Form add card</h2>
                </div>
                <form method="post" action="{{route('cards.borrow')}}">
                    @csrf
                    <div class="form-group" id="book-select">
                        <label>Books select</label>
                        <select name="book_id" class="form-control" >
                            @foreach($books as $book)
                                <label>
                                    <option value="{{$book->id}}">{{$book->name}}</option>
                                </label>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-1">
                            <a href="{{route('cards.back')}}" class="btn btn-danger">Back</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
@endsection

