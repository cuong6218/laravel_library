@extends('admin.dashboard.master')
@section('content')
        <div class="card-body">
            <div id="message_delete_type"></div>
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('types.create')}}" class="btn btn-success">Add type</a>
                </div>
                <div class="">
                    <form method="post" action="">
                        <input type="text" name="keyword" placeholder="keyword">
                        <button type="submit">Search</button>
                    </form>

                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                            <h1 class="text-center">List Type</h1>
                    </div>
                </div>
            <table class="table text-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col" colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse($types as $key => $type)
                        <tr >
                            <td>{{$key + 1}}</td>
                            <td id="type_name_{{$type->id}}">{{$type->name}}</td>
                            <td>
                                <a href="{{route('types.edit', $type->id)}}" class="btn btn-info"><span data-feather="arrow-up-circle"></span>&nbsp;
                                    Update</a>
                            </td>
                            <td>
{{--                                <a href="{{route('types.destroy', $type->id)}}" class="btn btn-danger" id="type_delete" data-id="{{$type->id}}" >Delete</a>--}}
                                <form method="post" action="{{route('types.destroy', $type->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" data-id="{{$type->id}}" class="btn btn-danger" id="type_destroy"><span data-feather="trash-2"></span>
                                        Delete</button>
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
            {{$types->links()}}
        </div>
    </div>
@endsection
