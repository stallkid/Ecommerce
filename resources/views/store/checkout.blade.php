
@extends('store.store')

@section('content')

  <div class="col-sm-9 padding-right">

      @if($cart == 'empty')
          <h3>Carrinho de compras vazio</h3>

      @else

      <H3>Pedido realizado com sucesso!</H3>

      <p>O pedido #{{ $order->id }}, foi realizado com sucesso.</p>
      @endif

</div>

@stop
