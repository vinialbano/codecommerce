@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Categories</h1>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                               class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('categories.destroy', ['category' => $category->id]) }}"
                               class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Create New Category</a>
        </div>
    </div>
@endsection