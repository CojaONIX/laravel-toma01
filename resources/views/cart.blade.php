@extends('layout')

@section('title', 'Cart')

@section('content')

    <div class="d-flex justify-content-between col-12 my-3">
        <a class="btn btn-outline-primary" href="{{ route('shop.page') }}">Back To Shop</a>
        <div class="">
        <form method="POST" action="{{ route('cart.empty') }}">
            @csrf
            <button class="btn btn-outline-primary" type="submit">Empty Cart</button>
        </form>
        </div>
    </div>

    <table class="table">
        <tr>
            <th>product_id</th>
            <th>product_name</th>
            <th>amount</th>
        </tr>

        @isset($cart)
        @foreach($cart as $item)
            <tr>
                <td>{{ $item['product_id'] }}</td>
                <td>{{ $item['product_name'] }}</td>
                <td>{{ $item['amount'] }}</td>
            </tr>
        @endforeach
        @endisset
    </table>

@endsection
