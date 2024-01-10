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
                <td><a href="{{ route('admin.delete.contact', ['contact' => $contact->id]) }}" class="btn btn-outline-danger">Delete</a></td>
            </tr>
        @endforeach
    </table>

@endsection
