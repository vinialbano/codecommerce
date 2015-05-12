@extends('app')

@section('content')
    <div class="container">
        <h1>Create Product</h1>

        <!-- Product Form -->
        {!! Form::open(['route' => 'products.store']) !!}

        <!-- Name Form Input -->
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', NULL, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Description Form Input -->
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description', NULL, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Price Form Input -->
        <div class="form-group">
            {!! Form::label('price','Price:') !!}
            {!! Form::input('number', 'price', NULL, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            {!! Form::submit('Add Product', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection