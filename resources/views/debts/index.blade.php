@extends('maket.skelet');

@section('content')
    <h1>Qarzlar</h1>
{{--    <a href="{{route('debts.create')}}" class="btn btn-primary mb-3">Qarz berish</a>--}}

    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Qariz berish
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
                        <form action="{{route('debts.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name-input" class="form-label">Name</label>
{{--                                <input type="text" name="name" class="form-control" id="name-input" required placeholder="Name">--}}
                                <select class="form-control" id="name-input" onchange = "desc()" name="customer_id">
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
{{--                                    <option>ljrg</option>--}}
                                </select>
                            </div>

{{--                            <div class="mb-3">--}}
{{--                                <label for="product-input" class="form-label">Product</label>--}}
{{--                                <input type="text" name="product" class="form-control" id="product-input" required--}}
{{--                                       placeholder="product">--}}
{{--                            </div>--}}

                            <div class="mb-3">
                                <label for="product-input" class="form-label">Product</label>
                                <textarea type="checkbox" class="form-control" rows="2" id="product-input" placeholder="Product" name="product"></textarea>
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
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Data_create</th>
                    <th>Deadline</th>
                    <th>Message status</th>
{{--                    <th>Actions</th>--}}
                </tr>
                </thead>
                <tbody>
{{--                @dd($customers);--}}
                @foreach($debts as $debt)
                <tr>
                    <td>{{$debt->id}}</td>
                  <td>{{$debt->user->firstName}}</td>
                  <td>{{$debt->customers->name}}</td>
                  <td>{{$debt->product}}</td>
                  <td>{{$debt->quantity.' so\'m'}}</td>
                  <td>{{$debt->created_at}}</td>
                  <td>{{$debt->deadline}}</td>
                  <td>{{$debt->messageStatus}}</td>
{{--                    <td>--}}
{{--                        <form action="{{route('debts.destroy', $debt->id)}}" method="post">--}}
{{--                            <a href="{{ route('debts.edit', $debt->id)}}" class="btn btn-success "><i class="fa fa-pencil"></i></a>--}}
{{--                            @method('DELETE')--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="btn btn-danger show_confirm"><i class="fa fa-trash"></i></button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <h3><b>Jami qarzlar miqdori: {{$sumQuantity}} so'm </h3>


@endsection
