@extends('admin.dashboard.master')
@section('content')
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('students.create')}}" class="btn btn-success">Add student</a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                            <h1 class="text-center">List Student</h1>
                    </div>
                </div>
            <table class="table text-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col" colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse($students as $key => $student)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$student->name}}</td>
                            @if($student->grade)
                                <td>{{$student->grade->name}}</td>
                            @else
                                <td>Not classified</td>
                            @endif
                            <td>{{$student->birth}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->address}}</td>
                            <td><a href="{{route('students.edit', $student->id)}}" class="btn btn-info"><span data-feather="arrow-up-circle"></span>&nbsp;Update</a> </td>
                            <td>
                                <form method="post" action="{{route('students.destroy', $student->id)}}">
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
            {{$students->links()}}
        </div>
    </div>
@endsection
