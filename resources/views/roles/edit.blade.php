@extends('maket.skelet')

@section('content')

    <div class="mb-4">
        <h1>Edit task</h1>
    </div>
    <div class="container mb-3">
        <form action="{{route('roles.update', $tasks->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name-input" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name-input" required
                       placeholder="Role name" value="{{$roles->name}}">
            </div>
            <div class="">
                <a href="{{route('$roles.index')}}" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-success">Edit task</button>
            </div>
        </form>
    </div>
@endsection
