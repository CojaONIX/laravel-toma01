@extends('layout')

@section('title', 'Contact')

@section('content')

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni deleniti porro tenetur est ad fugiat, aspernatur optio maxime laudantium cupiditate totam cum consequuntur nam non natus dolorem. Aperiam sit deserunt eos voluptatum, dignissimos excepturi corporis sunt facilis voluptatem ducimus esse omnis exercitationem consequuntur obcaecati iure aliquid ipsam? Eaque, corrupti. Et, minima iure esse impedit itaque dignissimos magnam mollitia consectetur inventore ex nesciunt quod totam repudiandae ut iusto. Dicta maiores fugiat suscipit asperiores animi veniam voluptatibus voluptatem voluptate laboriosam necessitatibus, ullam ipsa. Quaerat, nesciunt eius consequuntur, inventore odio ea ex saepe iusto dolores nihil repellendus tempora quae ducimus? Cupiditate, fugit illum!</p>

    <div class="row">
        <div class="col-6">
            <form method="POST" action="{{ route('send.contact') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email:" autofocus value="{{ old('email') }}">
                    <label for="email">Email:</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject:" value="{{ old('subject') }}">
                    <label for="subject">Subject:</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Message:" id="message" name="message" style="height: 200px">{{ old('message') }}</textarea>
                    <label for="message">Message:</label>
                </div>

                <button class="btn btn-outline-primary col-12 my-3" type="submit">Send</button>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>

        <iframe class="col-6" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46265.40050177258!2d21.672333980473038!3d43.552639209297766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47542d9634f80db1%3A0x73930c5060f43810!2z0JDQu9C10LrRgdC40L3QsNGG!5e0!3m2!1ssr!2srs!4v1704305868856!5m2!1ssr!2srs" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
@endsection
