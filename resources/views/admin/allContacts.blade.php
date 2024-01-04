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
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>{{ $contact->updated_at }}</td>
            </tr>
        @endforeach
    </table>
    
@endsection