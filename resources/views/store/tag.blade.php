@extends('store.store')

@section('sidebar')
    <div class="col-sm-3">
        <div class="left-sidebar">
            @include('store.partials.categories')
        </div>
    </div>
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{ $tag->name }}</h2>

            @include('store.partials.products',['products' => $products])

        </div>
        <!--features_items-->

    </div>
@endsection