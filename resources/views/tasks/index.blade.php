@extends('maket.skelet')

@section('content')
    <h1>Table</h1>
    <a href="{{route('tasks.create')}}" class="btn btn-primary mb-3">Add task</a>

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
                    <th>User</th>
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
                @foreach($task as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->task}}</td>
                    <td>{{$task->user->firstName}}</td>
                    <td>{{$task->deadline}}</td>
                    <td>
                        <form action="{{route('tasks.destroy', $task->id)}}" method="post">
                            <a href="{{ route('tasks.edit', $task->id)}}" class="btn btn-success "><i class="fa fa-pencil"></i></a>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger show_confirm"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
<script>
    @if ($message = Session::get('success'))
    toastr.success("{{$message}}");
    @endif
</script>
@endsection
