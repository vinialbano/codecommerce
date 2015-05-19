@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ $product->name }} Images</h1>
        </div>
        @if(!$product->images->isEmpty())
        <div class="row">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Extension</th>
                    <th>Action</th>
                </tr>
                @foreach($product->images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td><img src="{{ url('uploads/image'.$image->id.'.'.$image->extension) }}" width="80"/></td>
                        <td>{{ $image->extension }}</td>
                        <td><a href="{{ route('products.images.destroy', compact('product','image'))}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        @else
            <div class="row">
                <div class="alert alert-warning">
                    <p>There are no recorded images</p>
                </div>
            </div>
        @endif
        <div class="row">
            <a href="{{ route('products.index') }}" class="btn btn-default">Return</a>
            <a href="{{ route('products.images.create', compact('product')) }}" class="btn btn-success">Upload New Image</a>
        </div>
    </div>
@endsection