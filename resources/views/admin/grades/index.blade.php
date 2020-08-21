@extends('admin.dashboard.master')
@section('content')
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('grades.create')}}" class="btn btn-success">@lang('messages.add')</a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                            <h1 class="text-center">@lang('messages.list-grade')</h1>
                    </div>
                </div>
            <table class="table text-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('messages.grade-name')</th>
                    <th scope="col">@lang('messages.teacher')</th>
                    <th scope="col">@lang('messages.amount')</th>
                    <th scope="col" colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse($grades as $key => $grade)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><a href="{{route('grades.show', $grade->id)}}">{{$grade->name}} </a> </td>
                            <td>{{$grade->teacher}}</td>
                            <td>0</td>
                            <td><a href="{{route('grades.edit', $grade->id)}}" class="btn btn-info"><span data-feather="arrow-up-circle"></span>&nbsp;
                                    @lang('messages.update')</a> </td>
                            <td>
                                <form method="post" action="{{route('grades.destroy', $grade->id)}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger"><span data-feather="trash-2"></span>&nbsp;@lang('messages.delete')</button>
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
            {{$grades->links()}}
        </div>
    </div>
@endsection
