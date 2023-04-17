@extends('maket.skelet');

@section('content')
    <h1 class="text-center">Rollar</h1>
    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add role
        </button>
    </div>

    <!-- Modal -->
    <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Add role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{route('roles.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name-input" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name-input" required
                                       placeholder="Name">
                            </div>
                            <label>Huquqlari</label><br>
                        @foreach($permissions as $permission)
                                <label for="n{{ $permission->id }}">
                                        <input type="checkbox" name="permission[]" id="n{{ $permission->id }}" value="{{ $permission->name }}">
                                        {{ $permission->name }}
                                    </label><br>
                                @endforeach
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
                    <th>Huquqlari</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalPermissions">
                                    Huquqlari
                                </button>
                            </div>
                        </td>
                        <td>
                            <form action="{{route('roles.destroy', $role->id)}}" method="post" class="d-flex">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalEdit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                @method('DELETE')
                                @csrf
                                <button id="delete-btn" type="button" class="btn btn-danger"
                                        onclick="deleteRole({{$role->id}})"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal edit -->
    <div class=" modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Add role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{route('roles.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name-input" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name-input" required
                                       placeholder="Name">
                            </div>
                            <label>Huquqlari</label><br>
                            @foreach($permissions as $permission)
                                <label for="n{{ $permission->id }}">
                                    <input type="checkbox" name="permission[]" id="n{{ $permission->id }}" value="{{ $permission->name }}">
                                    {{ $permission->name }}
                                </label><br>
                            @endforeach
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


    <!-- Modal permissions -->
    <div class=" modal fade" id="exampleModalPermissions" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Huquqlari</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{route('roles.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name-input" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name-input" required
                                       placeholder="Name">
                            </div>
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

    {{--    Delete  --}}
    <script>
        function deleteRole(roleId) {
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
                    document.getElementById("delete-form-" + roleId).submit();
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
