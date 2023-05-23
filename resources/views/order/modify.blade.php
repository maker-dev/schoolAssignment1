@extends('layouts.app')
@section('title')
    Modify
@endsection

@section('content')
    <div class="container my-5">
        <form method="POST" action="{{ route('order.update', $productOrder[0]->pivot->order_num) }}">
            @csrf
            @method('put')
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger" role="alert">
                    {{ $err }}
                </div>
            @endforeach
            <div class="mb-3">
                <label class="form-label">Client Code</label>
                <input type="text" readonly class="form-control" name="ClientCode" value="{{ $client->CodeCli }}">
            </div>
            <select class="form-select mb-3" aria-label="Default select example" name="ProductCode">
                <option disabled selected>Choose Your Product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->CodePro }}"
                        {{ $productOrder[0]->CodePro == $product->CodePro ? 'selected' : '' }}>
                        {{ $product->NomPro }}
                    </option>
                @endforeach
            </select>
            <div class="mb-3">
                <label class="form-label">Product Quantity</label>
                <input type="number" class="form-control" name="ProductQuantity"
                    value="{{ $productOrder[0]->pivot->OrderQuantity }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
