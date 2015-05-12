@extends('app')

@section('content')
    <div class="container">
        <h1>Create Category</h1>

        <!-- Category Form -->
        {!! Form::open(['route' => 'categories.store']) !!}

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

            <!-- Submit Button -->
            <div class="form-group">
                {!! Form::submit('Add Category', ['class' => 'btn btn-primary form-control']) !!}
            </div>

        {!! Form::close() !!}

    </div>

@endsection