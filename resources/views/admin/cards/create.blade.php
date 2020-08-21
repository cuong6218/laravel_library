@extends('admin.dashboard.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <h2 class="text-center">Form add card</h2>
                </div>
                <form method="post" action="{{route('cards.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Borrow date</label>
                        <input type="date" name="borrow_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Return date</label>
                        <input type="date" name="return_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status" value="book borrow"  class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Student select</label>
                        <select name="student_id" class="form-control">
                            @foreach($students as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" id="add-select" class="btn btn-success">Add</button>
                    <div class="form-group" id="div-select">
                        <label>Books select</label>
                        <select name="book_id" id="book-select" class="form-control">
                            @foreach($books as $book)
                                <option id="book-option" value="{{$book->id}}">{{$book->name}}</option>
                            @endforeach
                        </select>
                    </div>
{{--                        <select name="book_id" id="" class="form-control" >--}}
{{--                            @foreach($books as $book)--}}
{{--                                <label>--}}
{{--                                    <option value="{{$book->id}}">{{$book->name}}</option>--}}
{{--                                </label>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
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
        <script>
            var books = '<?php echo($books)?>';
        </script>
@endsection
