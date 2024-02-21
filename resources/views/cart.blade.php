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
            <th>stock_amount</th>
            <th>amount</th>
            <th>price</th>
            <th>value</th>
        </tr>

        @isset($cart)
            @foreach($cart as $item)
                @foreach($products as $product)
                    @if(@$product->id == $item['product_id'])
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->amount }}</td>
                        <td>{{ $item['amount'] }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->price * $item['amount'] }}</td>
                    </tr>
                    @endif
                @endforeach
            @endforeach
        @endisset
    </table>

@endsection
