@extends('maket.skelet');

@section('content')
    <h4 style="color: red" class="text-center">
        <b>{{"'".$customers->name."' ning jami: ". $customers->debt." so'm qarzi bor"}}</b></h4>
    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Qariz berish
        </button>
    </div>

    <!-- Modal qarz berish -->
    <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Qarzdor qo'shish oynasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{route('debts.store')}}" method="post">
                            @csrf

                            <input type="hidden" name="customer_id" value="{{$customers->id}}">

                            <div class="mb-3">
                                <label for="product-input" class="form-label">Product</label>
                                <textarea type="checkbox" class="form-control" rows="2" id="product-input"
                                          placeholder="Product" name="product"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="quantity-input" class="form-label">Quantity</label>
                                <input type="text" name="quantity" class="form-control" id="quantity-input" required
                                       placeholder="Quantity">
                            </div>

                            <div class="mb-3">
                                <label for="deadline-input" class="form-label">Deadline</label>
                                <input type="date" name="deadline" class="form-control" id="deadline-input" required
                                       placeholder="Deadline">
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

    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalPay">
            Payment
        </button>
    </div>

    <!-- Modal payments -->
    <div class=" modal fade" id="exampleModalPay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="customer_id" value="{{$customers->id}}">
                            <div class="mb-3">
                                <label for="quantity-input" class="form-label">Quantity</label>
                                <input type="text" name="quantity" class="form-control" id="quantity-input" required
                                       placeholder="Quantity">
                            </div>
                            <br>
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

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Olingan qarizlar tarixi
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>created_at</th>
                                <th>Deadline</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($debts as  $i => $debt)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$debt->product}}</td>
                                    <td>{{$debt->quantity. " so'm"}}</td>
                                    <td>{{$debt->deadline}}</td>
                                    <td>{{$debt->created_at}}</td>
                                    <td>{{$debt->debtStatus}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h6><b>Shu vaqtgacha olgan qarzi: {{$totalQuantity . " so'm"}}</h6>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        To'lovlar tarixi
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
            </div>
        </div>
    </div>


    <script>
        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif
    </script>
@endsection
