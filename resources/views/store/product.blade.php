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
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                @if(count($product->images))
                    <img src="{{ url(getImageUrl($product->images->first())) }}" alt="" width="200"/>
                @else
                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200"/>
                @endif

            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($product->images as $image)
                            <a href="#"><img src="{{ url(getImageUrl($image)) }}" alt="" width="80"></a>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <h2>{{ $product->category->name }} :: {{ $product->name }}</h2>

                <p>{{ $product->description }}</p>
                <span>
                    <span>R$ {{ number_format($product->price,2,',','.') }}</span>
                    <a href="{{ route('cart.add', ['product' => $product, 'quantity' => 1]) }}" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Adicionar no Carrinho
                    </a>
                </span>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
</div>
@endsection