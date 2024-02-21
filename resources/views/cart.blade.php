@extends('layout')

@section('title', 'Cart')

@section('content')

    <table class="table">
        <tr>
            <th>product_id</th>
            <th>amount</th>
        </tr>

        @foreach($cart as $item)
            <tr>
                <td>{{ $item['product_id'] }}</td>
                <td>{{ $item['amount'] }}</td>
            </tr>
        @endforeach
    </table>


@endsection
