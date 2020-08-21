@extends('admin.dashboard.master')
@section('content')
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('users.create')}}" class="btn btn-success">Add user</a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                            <h1 class="text-center">List User</h1>
                    </div>
                </div>
            <table class="table text-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Roles</th>
                    <th scope="col" colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse($users as $key => $user)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{$role->name}}<br/>
                                @endforeach
                            </td>
                            <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-info"><span data-feather="arrow-up-circle"></span>&nbsp;Update</a> </td>
                            <td>
                                <form method="post" action="{{route('users.destroy', $user->id)}}">
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
            {{$users->links()}}
        </div>
    </div>
@endsection
