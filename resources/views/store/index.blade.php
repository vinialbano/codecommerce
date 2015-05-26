@extends('store.store')

@section('categories')
    @include('store.partials.categories')
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