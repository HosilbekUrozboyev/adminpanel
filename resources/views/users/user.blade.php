@extends("maket.skelet");

@section('content')
    <h1 class="text-center">Users</h1>

    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add user
        </button>
    </div>

    <!-- Add modal -->
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
                                <label for="firstName-input" class="form-label">First Name</label>
                                <input type="text" name="firstName" class="form-control" id="firstName-input" required
                                       placeholder="First Name">
                            </div>

                            <div class="mb-3">
                                <label for="lastName-input" class="form-label">Last Name</label>
                                <input type="text" name="lastName" class="form-control" id="lastName-input" required
                                       placeholder="Last Name">
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber-input" class="form-label">Phone Number</label>
                                <input type="text" name="phoneNumber" class="form-control" id="phoneNumber-input"
                                       required
                                       placeholder="+998 90 123 45 67">
                            </div>
                            <div class="mb-3">
                                <label for="email_input" class="form-label">Email manzili</label>
                                <input type="email" name="email" class="form-control" id="email_input" required
                                       placeholder="google@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="password-input" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password-input"
                                       aria-activedescendant="password-help">
                                <div style="color: red" id="password-help" class="form-text">Parol kamida 8 ta belgidan
                                    iborat bo'lsin
                                </div>
                            </div>

                            <div>
                                <label for="rol-input" class="form-label">Foydalanuvchi turi</label>
                                <select id="rol-input" name="rol" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                    {{--                                    <option value="user">user</option>--}}
                                    {{--                                    <option value="admin">admin</option>--}}
                                </select>
                            </div>
                            <br><br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const passwordInput = document.getElementById("password-input");

        passwordInput.addEventListener("input", function () {
            const passwordValue = passwordInput.value;

            if (passwordValue.length < 8) {
                passwordInput.setCustomValidity("Parol kamida 8 ta belgidan iborat bo'lishi kerak");
            } else {
                passwordInput.setCustomValidity("");
            }
        });
    </script>

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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>rol</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
{{--                {{$i=1}}--}}
                @foreach($users as $i => $user)
                    {{-- @dd($users);--}}
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->phoneNumber}}</td>
                        <td>{{$user->email}}</td>
                        <td>

                            @foreach($user->getRoleNames() as $data)
                                <p class="btn btn-info">{{ $data }}</p>
                            @endforeach
                        </td>
                        <td class="">
                            <form action="{{route('users.destroy', $user->id)}}" method="post"
                                  id="delete-form-{{$user->id}}" class="d-flex">
                                <button type="button" class="btn btn-success" onclick="edit({{$user}})"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                @method('DELETE')
                                @csrf
                                <button id="delete-btn" type="button" class="btn btn-danger"
                                        onclick="deleteUser({{$user->id}})"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- Update users modal -->
    <div class=" modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Edit user data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="edit-form" method="post">
                            @csrf
                            @method('PUT')
                            <div class="d-flex">
                                <div class="mb-3 col-6">
                                    <label for="firstName-input" class="form-label">FirstName</label>
                                    <input type="text" name="firstName" class="form-control" id="firstName-input-edit"
                                           required
                                           placeholder="Name">
                                </div>
                                <div class=" col-6 mb-3">
                                    <label for="lastName-input" class="form-label">LastName</label>
                                    <input type="text" name="lastName" class="form-control" id="lastName-input-edit"
                                           required placeholder="Last Name">
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="email_input" class="form-label ">Email</label>
                                    <input type="email" name="email" class="form-control" id="email-input-edit" required
                                           placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="password-input1" class="form-label">Password</label>
                                    <input type="password" name="updatePassword" required class="form-control" id="password-input1">
{{--                                    <div style="color: red" id="password-help" class="form-text">Parol kamida 8 ta belgidan--}}
{{--                                        iborat bo'lsin--}}
{{--                                    </div>--}}
                                </div>

                            </div>
                            <div class="d-flex">
                                <div class="mb-3 col-6">
                                    <label for="phoneNumber-input" class="form-label">Phone Number</label>
                                    <input type="tel" name="phoneNumber" class="form-control" id="phoneNumber-input-edit"
                                           required
                                           placeholder="+998 90 123 45 67">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="rol-input" class="form-label">Foydalanuvchi turi</label>
                                    <select id="rol-input" name="rol" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <script>
                                const passwordInput = document.getElementById("password-input1");

                                passwordInput.addEventListener("input1", function () {
                                    const passwordValue = passwordInput.value;

                                    if (passwordValue.length < 8) {
                                        passwordInput.setCustomValidity("Parol kamida 8 ta belgidan iborat bo'lishi kerak");
                                    } else {
                                        passwordInput.setCustomValidity("");
                                    }
                                });
                            </script>


                           <br><br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" onclick="form_edit()" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        let id;
        function edit(user) {
            id = user.id;
            //console.log(user);
            document.getElementById('firstName-input-edit').value = user.firstName;
            document.getElementById('lastName-input-edit').value = user.lastName;
            document.getElementById('phoneNumber-input-edit').value = user.phoneNumber;
            document.getElementById('email-input-edit').value = user.email;
        }

        function form_edit() {
            let form = document.getElementById('edit-form');
            form.action = "users/" + id;
           // console.log(form.action);
            form.submit();
        }
    </script>


    {{--    Delete  --}}
    <script>
        function deleteUser(userId) {
            Swal.fire({
                title: 'Haqiqatan ham o`chirmoqchimisiz?',
                text: "Agar tasdiqlasangiz malumotingiz butunlayga yo'qoladi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ha, o`chirish!',
                cancelButtonText: 'Bekor qilish'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("delete-form-" + userId).submit();
                }
            })
        }
    </script>

    {{--    Xatolik va message uchun  --}}

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
        });

        @if ($message = Session::get('success'))
        Toast.fire({
            icon: 'success',
            title: '{{$message}}'
        });
        @endif

        @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Xatoliklar ro`y berdi:',
            @foreach($errors->all() as $error)
            text: '{{$error}}',
            @endforeach
        });
        @endif
    </script>

@endsection

