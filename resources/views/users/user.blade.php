@extends('maket.skelet');

@section('content')
    <h1>Users</h1>

    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add user
        </button>
    </div>

    <!-- Modal -->
    <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{route('users.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name-input" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name-input" required placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="phone-input" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone-input" required placeholder="+998 90 123 45 67">
                            </div>
                            <div class="mb-3">
                                <label for="email_input" class="form-label">Email manzili</label>
                                <input type="email" name="email" class="form-control" id="email_input" required placeholder="google@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="password_input" class="form-label">Parol</label>
                                <input type="password" name="password" class="form-control" id="password_input" aria-activedescendant="password-help">
                                <div style="color: red" id="password-help" class="form-text">Parol kamida 5 ta belgidan iborat bo'lsin</div>
                            </div>
                            <div>
                                <label for="rol-input" class="form-label">Foydalanuvchi turi</label>
                                <select id="rol-input" name="rol" class="form-control">
{{--                                    <option>Foydalanuvchi turini tanlang</option>--}}
                                    <option value="1">admin</option>
                                    <option value="2">user</option>
                                </select>
                            </div>
{{--                            <br><button class="btn btn-primary">Yuborish</button>--}}
                            <br><br><div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    users table--}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>rol</th>
                    <th></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Telefon</th>
                    <th>Email</th>
                    <th>rol</th>
                    <th></th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($users as $user)
                    {{-- @dd($users);--}}
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->tel_raqam}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->rol}}</td>
                        <td>
                            <a href="{{ route('edit.user',['id' => $user->id])}}" class="btn btn-success"><i class="fa fa-pencil"></i>Edit</a>
                            <button class="btn btn-danger"><i class="fa fa-trash-o"></i>delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
