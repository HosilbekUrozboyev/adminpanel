@extends('maket.skelet');

@section('content')
    <h1 class="text-center">Qarizdorlar ro'yxati</h1>

    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Qarizdor yaratish
        </button>
    </div>

    <!-- Modal -->
    <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Qarzdor qo'shish oynasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{route('customers.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name-input" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name-input" required
                                       placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber-input" class="form-label">Phone Number</label>
                                <input type="tel" name="phoneNumber" class="form-control" id="phoneNumber-input"
                                       required
                                       placeholder="+998 90 123 45 67">
                            </div>
                            <div class="mb-3">
                                <label for="adress-input" class="form-label">Yashash manzili</label>
                                <input type="text" name="adress" class="form-control" id="adress-input" required
                                       placeholder="Yashash manzili">
                            </div>

                            {{--                            <div class="mb-3">--}}
                            {{--                                <label for="status-input" class="form-label">Eslatma</label>--}}
                            {{--                                <input type="text" name="status" class="form-control" id="status-input">--}}
                            {{--                            </div>--}}

                            <div class="mb-3">
                                <label for="textarea-input" class="form-label">Qarizdor haqida eslatma</label>
                                <textarea type="checkbox" class="form-control" rows="3" id="textarea-input"
                                          placeholder="Text" name="debtStatus"></textarea>
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
                    <th>Phone Number</th>
                    <th>Adress</th>
                    <th>Debt</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
{{--                {{$i=0}}--}}
                @foreach($customers as $i => $customer)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phoneNumber}}</td>
                        <td>{{$customer->adress}}</td>
                        <td>{{$customer->debt}}</td>
                        <td>{{$customer->debtStatus}}</td>
                        <td>


                            <form action="{{route('customers.destroy', $customer->id)}}" method="post" class="d-flex"
                                  id="delete-form-{{$customer->id}}">
                                <a type="button" class="btn btn-primary"
                                   href="{{route('customers.show', $customer->id)}}"><i class="fa fa-wallet"></i></a>


                                <button type="button" class="btn btn-success" onclick="edit({{$customer}})"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                @method('DELETE')
                                @csrf
                                <button id="delete-btn" type="button" class="btn btn-danger"
                                        onclick="deleteUser({{$customer->id}})"><i
                                        class="fa fa-trash"></i></button>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>





    <!-- Update customer modal -->
    <div class=" modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Edit customer data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form  id="edit-form" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name-input" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name-input-edit" required
                                       placeholder="Name" value="{{$customer->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber-input" class="form-label">Phone Number</label>
                                <input type="tel" name="phoneNumber" class="form-control" id="phoneNumber-input-edit"
                                       required
                                       placeholder="+998 90 123 45 67" value="{{$customer->phoneNumber}}">
                            </div>
                            <div class="mb-3">
                                <label for="adress-input" class="form-label">Yashash manzili</label>
                                <input type="text" name="adress" class="form-control" id="adress-input-edit" required
                                       placeholder="Yashash manzili" value="{{$customer->adress}}">
                            </div>
                            <div class="mb-3">
                                <label for="textarea-input" class="form-label">Qarizdor haqida eslatma</label>
                                <textarea type="checkbox" class="form-control" rows="3" id="textarea-input-edit"
                                          placeholder="Text" name="debtStatus" value="{{$customer->debtStatus}}"></textarea>
                            </div>

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

        function edit(customer) {
            id = customer.id;
            console.log(customer);
            document.getElementById('name-input-edit').value = customer.name;
            document.getElementById('phoneNumber-input-edit').value = customer.phoneNumber;
            document.getElementById('adress-input-edit').value = customer.adress;
            document.getElementById('textarea-input-edit').value = customer.debtStatus;
        }
        function form_edit(){
            let form = document.getElementById('edit-form');
            form.action = "customers/"+id;
            console.log(form.action);
            form.submit();
        }
    </script>




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


    {{--Delete--}}
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

@endsection
