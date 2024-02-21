@extends('layout')

@section('title', 'Admin - editProduct')

@section('content')

    <div class="col-8">
        <form method="POST" action="{{ route('admin.product.update', ['product'=>$product->id]) }}">
            @csrf
            @method('put')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name:" value="{{ old('name', $product->name) }}">
                <label for="name">Name:</label>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Description:" id="description" name="description" style="height: 200px">{{ old('description', $product->description) }}</textarea>
                <label for="description">Description:</label>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="form col-6">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $product->amount) }}">
                    @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form col-6">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label class="form-label" for="image">Image:</label>
                <input type="file" class="form-control mb-3" id="image" name="image" value="{{ old('image', $product->image) }}">
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
