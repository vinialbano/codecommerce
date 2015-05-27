@extends('store.store')

@section('sidebar')
    <div class="col-sm-3">
        <div class="left-sidebar">
            @include('store.partials.categories')
            @include('store.partials.tags')
        </div>
    </div>
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            @include('store.partials.products',['products' => $featuredProducts])
        </div>
        <!--features_items-->


        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            @include('store.partials.products',['products' => $recommendedProducts])
        </div>
        <!--recommended-->

    </div>
@endsection