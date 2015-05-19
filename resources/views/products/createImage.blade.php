@extends('app')

@section('content')
    <div class="container">
        <h1>Upload New Image</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <!-- Product Form -->
    {!! Form::open(['route' => ['products.images.store', $product->id], 'enctype' => 'multipart/form-data']) !!}

        <!-- Image Form Input -->
        <div class="form-group">
            {!! Form::label('image','Image:') !!}
            {!! Form::file('image', null, ['class'   =>  'form-control']) !!}
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            {!! Form::submit('Upload Image', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection