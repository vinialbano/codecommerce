@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Products</h1>
        </div>
        <div class="row">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>$ {{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                               class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('products.destroy', ['product' => $product->id]) }}"
                               class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
        </div>
    </div>
@endsection