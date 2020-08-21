@extends('admin.dashboard.master')
@section('content')
    <div class="card-body">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="text-center">Detail Card ID {{$card->id}}</h1>
            </div>
        </div>
        <table class="table text-center">
            <thead class="thead-light">
            <tr>
                <th scope="col">Student name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Borrow date</th>
                <th scope="col">Return date</th>
                <th scope="col">Book Borrow</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    @if($card->student)
                        <td>{{$card->student->name}}</td>
                        <td>{{$card->student->phone}}</td>
                        <td>{{$card->student->email}}</td>
                        <td>{{$card->student->address}}</td>
                            <td>{{$card->borrow_date}}</td>
                            <td>{{$card->return_date}}</td>
                        <td>
                            @foreach($card->books as $book)
                                {{$book->name}}<br/>
                            @endforeach
                        </td>
{{--                    @if($card->books)--}}
{{--                            <td>--}}
{{--                                @foreach($card->books as $book)--}}
{{--                                    {{$book->name}}<br/>--}}
{{--                                @endforeach--}}
{{--                            </td>--}}
{{--                    @else--}}
{{--                        <td>Not classified</td>--}}
{{--                    @endif--}}
                        @endif
            </tbody>
        </table>
    </div>
    </div>
@endsection

