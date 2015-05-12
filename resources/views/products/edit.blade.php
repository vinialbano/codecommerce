@extends('app')

@section('content')
    <div class="container">
        <h1>Edit Product: {{ $product->name }}</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <!-- Product Form -->
        {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'PUT']) !!}

        <!-- Name Form Input -->
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', $product->name, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Description Form Input -->
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description', $product->description, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Price Form Input -->
        <div class="form-group">
            {!! Form::label('price','Price:') !!}
            {!! Form::input('number', 'price', $product->price, ['class'   =>  'form-control', 'step' => '0.01']) !!}
        </div>

        <!-- Featured Form Input -->
        <div class="form-group">
            {!! Form::label('featured','Featured:') !!}
            {!! Form::hidden('featured', 0) !!}
            {!! Form::checkbox('featured', 1, $product->featured) !!}
        </div>

        <!-- Recommended Form Input -->
        <div class="form-group">
            {!! Form::label('recommended','Recommended:') !!}
            {!! Form::hidden('recommended', 0) !!}
            {!! Form::checkbox('recommended', 1, $product->recommended) !!}
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            {!! Form::submit('Save Product', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection