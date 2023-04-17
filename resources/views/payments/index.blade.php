@extends('maket.skelet');

@section('content')
    <h1 class="text-center">To'lovlar</h1>

    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Payment
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
                        <form action="{{route('payments.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name-input" class="form-label">Name</label>
{{--                                <input type="text" name="name" class="form-control" id="name-input" required placeholder="Name">--}}
                                <select class="form-control" id="name-input" onchange = "desc()" name="customer_id">
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="quantity-input" class="form-label">Quantity</label>
                                <input type="text" name="quantity" class="form-control" id="quantity-input" required
                                       placeholder="Quantity">
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
                    <th>User</th>
                    <th>Customer</th>
                    <th>Quantity</th>
                    <th>Data_create</th>
                </tr>
                </thead>
                <tbody>
{{--                @dd($customers);--}}
                @foreach($payments as $payment)
                <tr>
                    <td>{{$payment->id}}</td>
                  <td>{{$payment->user->firstName}}</td>
                  <td>{{$payment->customer->name}}</td>
                  <td>{{$payment->quantity.' so\'m'}}</td>
                  <td>{{$payment->created_at}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{--    <h3><b>Jami qarzlar miqdori: {{$sumQuantity}} so'm</h3>--}}

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

@endsection
