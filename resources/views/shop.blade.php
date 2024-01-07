@extends('layout')

@section('title', 'Shop')
 
@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

    @foreach ($products as $product)
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
                <a href="#" class="btn btn-primary">Read more...</a>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection