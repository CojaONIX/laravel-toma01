@extends('layout')

@section('title', 'Admin - allContacts')

@section('content')

    <table class="table">
        <tr>
            <th>id</th>
            <th>email</th>
            <th>subject</th>
            <th>message</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Action</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>{{ $contact->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.contact.delete', ['contact' => $contact->id]) }}" class="btn btn-outline-danger">Delete</a>
                    <a href="{{ route('admin.contact.edit.page', ['contact' => $contact->id]) }}" class="btn btn-outline-primary">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection
