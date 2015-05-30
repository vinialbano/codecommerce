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
                                    <a href="{{ route('store.products', ['product' => $k]) }}"><img
                                                src="{{ url('uploads/image'.$item['product']->images->first()->id.'.'.$item['product']->images->first()->extension) }}"
                                                alt="" width="200"/></a>
                                @else
                                    <a href="{{ route('store.products', ['product' => $k]) }}"><img
                                                src="{{ url('images/no-img.jpg') }}" alt=""/></a>
                                @endif
                            </td>
                            <td class="cart_description">
                                <h4>
                                    <a href="{{ route('store.products', ['product' => $k]) }}">{{ $item['product']->name }}</a>
                                </h4>

                                <p>Código {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ number_format($item['product']->price,2,',','.') }}
                            </td>
                            <td class="cart_quantity">
                                <select class="quantity" id="quantity{{ $k }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price" id="price{{ $k }}">
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
                                <span style="margin-right: 90px" id="total">Total: R$ {{ number_format($cart->getTotal(),2,',','.') }}</span>
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

@section('javascript')
    <script>
        $(document).ready(function () {
            @foreach($cart->getItems() as $k=>$item)
            $('#quantity' + {{ $k }} +' option[value="{{ $item['quantity'] }}"]').prop('selected', true);
            @endforeach

            $(".quantity").change(function () {
                        var id = $(this).attr('id').replace('quantity', '');
                        var quantity = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "cart/update/" + id + '/' +  quantity,
                    data: {},
                    success: function(result){
                        if(result.success){
                            $('#price' + id).text('R$ ' + result.price);
                            $('#total').text('R$ ' + result.total);
                        } else {
                            alert("Ocorreu um erro e não conseguimos atualizar o carrinho");
                        }
                    }
                })
            });
        });
    </script>
@endsection