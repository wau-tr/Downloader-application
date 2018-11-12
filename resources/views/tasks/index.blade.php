@extends('html')

@section('content')
    <a href="{{ route('tasks.create') }}" class="btn btn-success my-5">
        +
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Status</th>
            <th scope="col">Url</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <th scope="row"> {{ $task->id }} </th>
                    <td> {{ $task->status }} </td>
                    <td> <a class="btn btn-default href" href="{{ $task->getResourceUrl() }}">Link</a> </td>
            </tr>
            @empty
                <tr><td>No tasks.</td></tr>
            @endforelse
    </tbody>
    </table>
@endsection    