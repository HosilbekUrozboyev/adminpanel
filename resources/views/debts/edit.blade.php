@extends('maket.skelet')

@section('content')

    <div class="mb-4">
        <h1>Edit task</h1>
    </div>
    <div class="container mb-3">
        <form action="{{route('tasks.update', $tasks->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="task_name-input" class="form-label">Task name</label>
                <input type="text" name="task_name" class="form-control" id="task_name-input" required
                       placeholder="Vazifa kiriting" value="{{$tasks->task}}">
            </div>
            <div class="mb-3">
                <label for="deadline-input" class="form-label">Deadline</label>
                <input type="date" name="deadline" class="form-control" id="deadline-input" required
                       placeholder="Bajarish muddati" value="{{$tasks->deadline}}">
            </div>
            <div class="">
                <a href="{{route('tasks.index')}}" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-success">Edit task</button>
            </div>
        </form>
    </div>
@endsection
