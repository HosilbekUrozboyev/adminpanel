@extends('maket.skelet')

@section('content')
    <h1>Edit users</h1>

    <div class="container">
        <form action="{{route('users.update',$user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="firstName-input" class="form-label">First Name</label>
                <input type="text" name="firstName" class="form-control" id="name-input" required
                       placeholder="First Name" value="{{$user->firstName}}">
            </div>

            <div class="mb-3">
            <label for="lastName-input" class="form-label">Last Name</label>
            <input type="text" name="lastName" class="form-control" id="lastName-input" required placeholder="Last Name"
                   value="{{$user->lastName}}">
            </div>
            <div class="mb-3">
                <label for="phoneNumber-input" class="form-label">Phone Number</label>
                <input type="text" name="phoneNumber" class="form-control" id="phoneNumber-input" required
                       placeholder="+998 90 123 45 67" value="{{$user->phoneNumber}}">
            </div>
            <div class="mb-3">
                <label for="email_input" class="form-label">Email manzili</label>
                <input type="email" name="email" class="form-control" id="email_input" required
                       placeholder="google@gmail.com"
                       value={{"$user->email"}}>
            </div>
            <div class="mb-3">
                <label for="password-input" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password-input"
                       aria-activedescendant="password-help">
                {{--        <div style="color: red" id="password-help" class="form-text">Parol kamida 5 ta belgidan iborat bo'lsin</div>--}}
            </div>

            <div>
                <label for="rol-input" class="form-label">Foydalanuvchi turi</label>
                <select id="rol-input" name="rol" class="form-control">
                    {{--                                    <option>Foydalanuvchi turini tanlang</option>--}}
                    <option value="0">user</option>
                    <option value="1">admin</option>
                </select>
            </div>
            <br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update user</button>
            </div>
        </form>
    </div>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        @if ($message = Session::get('success'))
        Toast.fire({
            icon: 'success',
            title: '{{$message}}'
        })
        @endif
        @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Xatolik!',
            @foreach($errors->all() as $error)
            text: '{{$error}}',
            @endforeach
        })
        @endif
    </script>

    <script>
        const passwordInput = document.getElementById("password-input");

        passwordInput.addEventListener("input", function() {
            const passwordValue = passwordInput.value;

            if (passwordValue.length < 8) {
                passwordInput.setCustomValidity("Parol kamida 8 ta belgidan iborat bo'lishi kerak");
            } else {
                passwordInput.setCustomValidity("");
            }
        });
    </script>

@endsection
