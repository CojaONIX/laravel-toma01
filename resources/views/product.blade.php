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

                <form method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="1">
                    @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-outline-primary col-12 my-3" type="submit">Add to Cart</button>
                </form>

            </div>
        </div>
    </div>
@endsection
