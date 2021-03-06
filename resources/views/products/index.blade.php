@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Products</h1>
        </div>
        @if(!$products->isEmpty())
        <div class="row">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Recommended</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>$ {{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ ($product->featured)?"True":"False" }}</td>
                        <td>{{ ($product->recommended)?"True":"False" }}</td>
                        <td class="btn-group">
                            <a href="{{ route('products.edit', compact('product')) }}"
                               class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('products.images', compact('product')) }}"
                               class="btn btn-default btn-sm">Images</a>
                            <a href="{{ route('products.destroy', compact('product')) }}"
                               class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            {!! $products->render() !!}
        </div>
        @else
            <div class="row">
                <div class="alert alert-warning">
                    <p>There are no recorded products</p>
                </div>
            </div>
        @endif
        <div class="row">
            <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
        </div>
    </div>
@endsection