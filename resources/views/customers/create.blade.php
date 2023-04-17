@extends('maket.skelet');

@section('content')

    <div class="mb-4">
        <h1>Create task</h1>
    </div>
    <div class="container mb-3">
        <form action="{{route('tasks.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="task_name-input" class="form-label">Task name</label>
                <input type="text" name="task_name" class="form-control" id="task_name-input" required
                       placeholder="Vazifa kiriting">
            </div>
            <div class="mb-3">
                <label for="deadline-input" class="form-label">Deadline</label>
                <input type="date" name="deadline" class="form-control" id="deadline-input" required
                       placeholder="Bajarish muddati">
            </div>
            <div class="">
                <a href="{{route('tasks.index')}}" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-success">Create task</button>
            </div>
        </form>
    </div>
@endsection
