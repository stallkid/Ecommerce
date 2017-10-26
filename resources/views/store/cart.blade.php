
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
							<td class="price">Valor</td>
							<td class="price">Quantidade</td>
							<td class="price">Total</td>
							<td class="price"></td>
						</tr>
					</thead>

					<tbody>

					@if (!is_null($cart->all()))
						@forelse ($cart->all() as $k=>$item)

						<tr>
							<td class="cart_product">
								<a href="{{route('store.product',['id'=>$k])}}">Imagem</a>
							</td>

							<td class="cart_description">
								<h4><a href="{{route('store.product',['id'=>$k])}}">{{ $item['name'] }}</a></h4>
								<p>Código: {{ $k }}</p>
							</td>

							<td class="cart_price">
								R$ {{$item['price'] }}
							</td>

							<td class="cart_quantity">
								{{$item['qtd'] }}
							</td>

							<td class="cart_total">
								<p class="cart_total_price">R$ {{$item['price'] * $item['qtd'] }}</p>
							</td>

							<td class="cart_delete">
								<a href="{{ route('cart.destroy', ['id'=>$k]) }}" class="cart_quantity_delete">Delete</a>
							</td>

						</tr>
					@empty
						<tr>
								<td class="" colspan="5">
										<p>
											Nenhum item encontrado.
										</p>
								</td>
						</tr>

					@endforelse
					@endif
					<tr class="cart_menu">
							<td colspan="6">
									<div class="pull-right">
											<span style="margin-right: 100px">
											TOTAL: R$ {{$cart->getTotal()}}
											</span>

											<a href="{{ route('checkout.place')}}" class="btn btn-success">Fechar a Conta</a>
									</div>
							</td>
					</tr>

					</tbody>
				</table>

			</div>

		</div>
	</section>

@stop
