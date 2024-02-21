@extends('layout')

@section('title', 'Product')

@section('content')
    <a href="{{ route(\Illuminate\Support\Facades\Session::get('beforePage')) }}" class="btn btn-primary mb-3">Back</a>
    <div class="card-group">
        <div class="card">
            <div class="card-header">
                @if($product->image)
                    <img src="{{ $product->image }}" class="card-img-top">
                @else
                    <img src="https://picsum.photos/id/{{ $product->id }}/300/100.jpg" class="card-img-top">
                @endif
            </div>

            <div class="card-body">
                <h3 class="card-title">{{ $product->name }}</h3>
                <p class="card-text">{{ $product->description }}</p>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <h3>{{ number_format($product->price, 2) }}</h3>
                <a href="#" class="btn btn-primary">Add to chart</a>
            </div>
        </div>
    </div>
@endsection
