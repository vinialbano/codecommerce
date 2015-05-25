@extends('app')

@section('content')
    <div class="container">
        <h1>Create Product</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <!-- Product Form -->
        {!! Form::open(['route' => 'products.store']) !!}

        <!-- Name Form Input -->
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', null, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Category Form Input -->
        <div class="form-group">
            {!! Form::label('category','Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Description Form Input -->
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description', null, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Price Form Input -->
        <div class="form-group">
            {!! Form::label('price','Price:') !!}
            {!! Form::input('number', 'price', null, ['class'   =>  'form-control', 'step' => '0.01']) !!}
        </div>

        <!-- Featured and Recommended Form Inputs -->
        <div class="form-group">
            {!! Form::label('featured','Featured:') !!}
            {!! Form::hidden('featured', 0) !!}
            {!! Form::checkbox('featured', 1) !!}
            &nbsp;&nbsp;
            {!! Form::label('recommended','Recommended:') !!}
            {!! Form::hidden('recommended', 0) !!}
            {!! Form::checkbox('recommended', 1) !!}
        </div>

        <!-- Tags Form Input -->
        <div class="form-group">
            {!! Form::label('tags','Tags:') !!}
            {!! Form::textarea('tags', null, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            {!! Form::submit('Add Product', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection