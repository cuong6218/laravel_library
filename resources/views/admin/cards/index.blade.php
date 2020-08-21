@extends('admin.dashboard.master')
@section('content')
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('cards.getReturn')}}" class="btn btn-warning">List return card</a>
                </div>
                <div class="col-md-2">
                    <a href="{{route('cards.index')}}" class="btn btn-primary">List borrow card</a>
                </div>
                <div class="col-md-2">
                    <a href="{{route('cards.create')}}" class="btn btn-success">Add card</a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                            <h1 class="text-center">List Card</h1>
                    </div>
                </div>
            <table class="table text-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Card ID</th>
                    <th scope="col">Borrow date</th>
                    <th scope="col">Return date</th>
                    <th scope="col">Student name</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="3"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse($cards as $key => $card)
                        <tr>
                            <td><a href="{{route('cards.show', $card->id)}}"> Card ID: {{$card->id}}</a></td>
                            <td>{{$card->borrow_date}}</td>
                            <td>{{$card->return_date}}</td>
                            @if($card->student)
                                <td>{{$card->student->name}}</td>
                            @else
                                <td>Not classified</td>
                            @endif
                            <td>{{$card->status}}</td>
                            <td><a href="{{route('cards.edit', $card->id)}}" class="btn btn-info"><span data-feather="arrow-up-circle"></span>&nbsp;Update</a> </td>
                            <td><a href="{{route('cards.bookReturn', $card->id)}}" class="btn btn-secondary"><span data-feather="twitter"></span>&nbsp;Book return</a> </td>
                            <td>
                                <form method="post" action="{{route('cards.destroy', $card->id)}}">
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
            {{$cards->links()}}
        </div>
    </div>
@endsection
