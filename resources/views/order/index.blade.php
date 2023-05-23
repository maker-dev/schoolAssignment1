@extends('layouts.app')
@section('title')
    index
@endsection
@section('content')
    <div class="container">
        <table class="table table-hover mt-5">
            <thead>
                <tr class="table-dark text-white">
                    <th scope="col">ClientName</th>
                    <th scope="col">ProductName</th>
                    <th scope="col">OrderQuantity</th>
                    <th scope="col">OrderDate</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th>{{ $order->NomCli }}</th>
                        <th>{{ $order->NomPro }}</th>
                        <th>{{ $order->OrderQuantity }}</th>
                        <th>{{ $order->DateOrd }}</th>
                        <th>
                            <a href="{{ route('order.modify', $order->NumOrd) }}">Modify</a>
                            <form action="{{ route('order.destroy') }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" value="{{ $order->NumOrd }}" name="numord" />
                                <input type="hidden" value="{{ $order->CodePro }}" name="numpro" />
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
