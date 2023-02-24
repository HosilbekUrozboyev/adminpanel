@extends('maket.skelet');

@section('content')
    <h1>Edit users</h1>

    <div class="container">
        <form action="{{route('users.store')}}" method="post">
            @csrf
{{--            @dd($user);--}}
            <div class="mb-3">
                <label for="name-input" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name-input" required placeholder="Name" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                <label for="phone-input" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone-input" required placeholder="+998 90 123 45 67" value="{{$user->tel_raqam}}">
            </div>
            <div class="mb-3">
                <label for="email_input" class="form-label">Email manzili</label>
                <input type="email" name="email" class="form-control" id="email_input" required placeholder="google@gmail.com" value={{"$user->email"}}>
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
                <button type="submit" class="btn btn-primary">Update user</button>
            </div>
        </form>
    </div>
@endsection
