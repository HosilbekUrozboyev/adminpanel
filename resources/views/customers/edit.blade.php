@extends('maket.skelet');

@section('content')

    <div class="mb-4">
        <h1>Edit customer</h1>
    </div>
    <div class="container mb-3">
        <form action="{{route('customers.update', $customer->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name-input" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name-input" required
                       placeholder="Name" value="{{$customer->name}}">
            </div>

            <div class="mb-3">
                <label for="phoneNumber-input" class="form-label">Phone Number</label>
                <input type="text" name="phoneNumber" class="form-control" id="phoneNumber-input" required
                       placeholder="Phone Number" value="{{$customer->phoneNumber}}">
            </div>

            <div class="mb-3">
                <label for="adress-input" class="form-label">Adress</label>
                <input type="text" name="adress" class="form-control" id="adress-input" required
                       placeholder="Adress" value="{{$customer->adress}}">
            </div>

            <div class="mb-3">
                <label for="status-input" class="form-label">Eslatma</label>
                <input type="text" name="debtStatus" class="form-control" id="status-input" value="{{$customer->debtStatus}}">
            </div>

            <div class="">
                <a href="{{route('customers.index')}}" type="button" class="btn btn-secondary">Orqaga</a>
                <button type="submit" class="btn btn-success">Saqlash</button>
            </div>
        </form>
    </div>
@endsection
