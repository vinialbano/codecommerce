@extends('app')

@section('content')
    <div class="container">
        <h1>Edit Category: {{ $category->name }}</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <!-- Category Form -->
        {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}

        <!-- Name Form Input -->
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', $category->name, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Description Form Input -->
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description', $category->description, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            {!! Form::submit('Save Category', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection