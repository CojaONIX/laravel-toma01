@extends('layout')

@section('title', 'Cart')

@section('content')

    @foreach($cart as $id => $amount)
        {{ $id }} - {{ $amount }}
    @endforeach

@endsection
