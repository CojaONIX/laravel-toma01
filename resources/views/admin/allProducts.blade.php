@extends('layout')

@section('title', 'Admin - allProducts')

@section('content')

    <div class="d-flex justify-content-between align-items-start">
        <a href="{{ route('admin.add.product.page') }}" class="btn btn-primary mb-5">New Product</a>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <table class="table">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>amount</th>
            <th>price</th>
            <th>image</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->amount }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->image }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <div class="d-flex justify-content-between">
                        <form method="post" action="{{ route('admin.delete.product', ['product'=>$product->id]) }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                        </form>

                        <a href="{{ route('admin.edit.product.page', ['product' => $product->id]) }}" class="btn btn-outline-primary">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
