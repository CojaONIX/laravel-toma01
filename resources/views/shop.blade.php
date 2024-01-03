@extends('layout')

@section('title', 'Shop')
 
@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

    @foreach ($products as $product)
    <div class="card-group">
        <div class="card">
            <div class="card-header">
                <img src="{{ $product['image'] }}" class="card-img-top" alt="...">
            </div>

            <div class="card-body">
                <h3 class="card-title">{{ $product['title'] }}</h3>
                <p class="card-text">{{ $product['description'] }}</p>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="#" class="btn btn-primary">Read more...</a>
                @if($product['discount'])
                    <p class="text-danger">Discount</p>
                @endif
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection