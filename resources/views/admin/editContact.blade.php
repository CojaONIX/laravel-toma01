@extends('layout')

@section('title', 'Admin - editContact')

@section('content')

    <div class="col-6">
        <form method="POST" action="{{ route('admin.contact.update', ['contact'=>$contact->id]) }}">
            @csrf
            @method('put')
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email:" value="{{ old('email', $contact->email) }}">
                <label for="email">Email:</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject:" value="{{ old('subject', $contact->subject) }}">
                <label for="subject">Subject:</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Message:" id="message" name="message" style="height: 200px">{{ old('message', $contact->message) }}</textarea>
                <label for="message">Message:</label>
            </div>

            <button class="btn btn-outline-primary col-12 my-3" type="submit">Save</button>
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

@endsection
