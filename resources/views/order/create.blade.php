@extends('layouts.app')
@section('title')
    Create
@endsection
@section('content')
    <div class="container my-5">
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger" role="alert">
                    {{ $err }}
                </div>
            @endforeach
            <div class="mb-3">
                <label class="form-label">Client Code</label>
                <input type="text" class="form-control" name="ClientCode" value="{{ old('ClientCode') }}">
            </div>
            <select class="form-select mb-3" aria-label="Default select example" name="ProductCode">
                <option disabled selected>Choose Your Product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->CodePro }}" {{ old('ProductCode') == $product->CodePro ? 'selected' : '' }}>
                        {{ $product->NomPro }}
                    </option>
                @endforeach
            </select>
            <div class="mb-3">
                <label class="form-label">Product Quantity</label>
                <input type="number" class="form-control" name="ProductQuantity" value="{{ old('ProductQuantity') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
