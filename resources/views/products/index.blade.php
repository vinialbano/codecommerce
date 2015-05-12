@extends('app')

@section('content')
    <div class="container">
        <h1>Produtos</h1>
        <table class="table">
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
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection