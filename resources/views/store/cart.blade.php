@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Preço</td>
                        <td class="price">Quantidade</td>
                        <td class="price">Total</td>
                        <td class=""></td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cart->getItems() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                @if(count($item['product']->images))
                                    <a href="{{ route('store.products', ['product' => $k]) }}"><img src="{{ url('uploads/image'.$item['product']->images->first()->id.'.'.$item['product']->images->first()->extension) }}" alt="" width="200"/></a>
                                @else
                                    <a href="{{ route('store.products', ['product' => $k]) }}"><img src="{{ url('images/no-img.jpg') }}" alt=""/></a>
                                @endif
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.products', ['product' => $k]) }}">{{ $item['product']->name }}</a></h4>

                                <p>Código {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ number_format($item['product']->price,2,',','.') }}
                            </td>
                            <td class="cart_quantity">
                                {{ $item['quantity'] }}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    R$ {{ number_format($item['product']->price * $item['quantity'],2,',','.') }}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy', ['product' => $k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <a href="{{ route('store.index') }}">Não há nenhum produto no carrinho!</a>
                            </td>
                        </tr>
                    @endforelse
                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span style="margin-right: 90px">Total: R$ {{ $cart->getTotal() }}</span>
                                <a href="#" class="btn btn-success">Finalizar compra</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection