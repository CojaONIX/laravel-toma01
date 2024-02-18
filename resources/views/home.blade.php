@extends('layout')

@section('title', 'Home')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://picsum.photos/id/1/300/100.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://picsum.photos/id/2/300/100.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://picsum.photos/id/3/300/100.jpg" class="d-block w-100" alt="...">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>

    <hr>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nam earum asperiores! Exercitationem quis impedit a repudiandae in voluptas porro dolorum unde non officiis facere maxime labore ea nisi placeat dolore tempore tempora, sint quibusdam, fugiat explicabo accusamus distinctio. Laudantium corrupti aperiam odio atque tempora cumque? Illo iure laudantium ex eligendi maxime ab quis beatae aut sint, magni necessitatibus atque fuga corporis quia? Ea architecto accusantium atque ullam laborum consequatur, id repellendus earum distinctio! Aspernatur ad odio blanditiis officia harum quod vero eaque, qui fugit, provident sed velit nam repellat dolor alias perspiciatis doloremque dolorem recusandae suscipit temporibus voluptates quo! Ea doloremque, aliquid iste fugiat quia, ex sed vero quasi nobis exercitationem magnam obcaecati esse id cupiditate! Dicta, aperiam ut.</p>
    <hr>

    <h4>https://kurs.resenje.org/</h4>
    <div class="d-flex">
        <ul>
        @foreach($eurCurse as $key => $value)
            <ul>{{ $key }}: {{ $value }}</ul>
        @endforeach
        </ul>

        <ul>
            @foreach($usdCurse as $key => $value)
                <ul>{{ $key }}: {{ $value }}</ul>
            @endforeach
        </ul>
    </div>

    <hr>

    <h2>Latest products</h2>
    <p>{{ $currentDate }} {{ $currentTime }}
    @if ($hour < 12)
        <span>Dobro jutro!</span>
    @else
        <span>Dobar dan!</span>
    @endif
    </p>

    <hr>
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
