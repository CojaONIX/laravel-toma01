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

    <h2>Featured products</h2>
    <p>{{ $currentDate }} {{ $currentTime }} 
    @if ($hour < 12)
        <span>Dobro jutro!</span>
    @else
        <span>Dobar dan!</span>
    @endif
    </p>
    
    <hr>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="card-group">
            <div class="card">
                <div class="card-header">
                    <img src="https://picsum.photos/id/1/300/100.jpg" class="card-img-top" alt="...">
                </div>
    
                <div class="card-body">
                    <h3 class="card-title">Lorem ipsum dolor sit amet.</h3>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, sapiente repellat. Veniam illum adipisci aut fugiat, dicta molestias eum ab accusantium aperiam qui ex veritatis ipsam corporis quia perferendis alias reiciendis et ad. Vitae adipisci dolore harum tenetur doloribus molestiae sequi recusandae perspiciatis repellat autem. Recusandae non sint provident atque.</p>
                </div>
    
                <div class="card-footer d-flex justify-content-between">
                    <a href="#" class="btn btn-primary">Read more...</a>
                </div>
            </div>
        </div>
    
        <div class="card-group">
            <div class="card">
                <div class="card-header">
                    <img src="https://picsum.photos/id/2/300/100.jpg" class="card-img-top" alt="...">
                </div>
    
                <div class="card-body">
                    <h3 class="card-title">Lorem, ipsum dolor.</h3>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia provident suscipit odit odio sequi exercitationem aspernatur quisquam maiores nostrum! Enim id soluta rerum fugit hic doloremque nihil temporibus, ullam non autem corrupti, fuga esse incidunt omnis saepe iusto earum nam? Dicta illo laudantium, suscipit reprehenderit cum tempore. Sapiente dolor nisi a eius dolores provident sunt autem consequuntur similique perferendis rerum quibusdam, aliquam recusandae esse molestias alias fugiat. Dolores, quas, accusantium, nisi reiciendis velit inventore dolorem commodi nihil optio est rerum?</p>
                </div>
    
                <div class="card-footer d-flex justify-content-between">
                    <a href="#" class="btn btn-primary">Read more...</a>
                </div>
            </div>
        </div>
    
        <div class="card-group">
            <div class="card">
                <div class="card-header">
                    <img src="https://picsum.photos/id/3/300/100.jpg" class="card-img-top" alt="...">
                </div>
    
                <div class="card-body">
                    <h3 class="card-title">Lorem ipsum dolor sit.</h3>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, accusantium quis. Velit modi quaerat quae molestias veritatis voluptate, temporibus illo, nostrum est deserunt qui amet recusandae obcaecati? At, harum autem? Sapiente dolorum excepturi, libero beatae temporibus veniam pariatur adipisci unde voluptas assumenda officiis atque nulla. Amet cumque fugit rem illum veritatis commodi, fugiat eius impedit repellendus veniam nulla quia voluptas.</p>
                </div>
    
                <div class="card-footer d-flex justify-content-between">
                    <a href="#" class="btn btn-primary">Read more...</a>
                </div>
            </div>
        </div>
    </div>

@endsection