@extends('store.store')

@section('content')
    <div class="container">
        @if(!isset($order))
            <h3>Carrinho de compras vazio!</h3>
        @else
            <h3>Pedido realizado com sucesso!</h3>
            <p>O pedido #{{ $order->id }} foi realizado com sucesso</p>
        @endif
    </div>
@endsection