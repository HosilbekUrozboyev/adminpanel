@extends('maket.skelet');

@section('content')
    <h1>Table</h1>
    <button class="btn btn-primary mb-3">Add task</button>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
                </thead>
{{--                <tfoot>--}}
{{--                <tr>--}}
{{--                    <th>ID</th>--}}
{{--                    <th>Title</th>--}}
{{--                    <th>Deadline</th>--}}
{{--                    <th>Actions</th>--}}
{{--                </tr>--}}
{{--                </tfoot>--}}
                <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->task}}</td>
                    <td>{{$task->deadline}}</td>
                    <td>
                        <button class="btn btn-success">edit</button>
                        <button class="btn btn-danger">edit</button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
