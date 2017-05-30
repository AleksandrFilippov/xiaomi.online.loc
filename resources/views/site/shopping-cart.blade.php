@if(Session::has('cart'))
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<ul class="list-group">
				@foreach($products as $product)
					<li class="list-group-item">
						<span class="badge">{{ $product['qty'] }}</span>
						<strong>{{ $product['item']['title'] }}</strong>
						<span class="label label-success">{{ $product['price'] }}</span>
						<div class="btn-group">
							<button type="button" class="btn btn-primaru btn-xs.dropdown-toogle" data-toggle="dropdown">Удалить <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="#">Удалить 1 шт</a></li>
								<li><a href="#">Удалить все</a></li>
							</ul>
						</div>
					</li>
				@ensforeach
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<strong>Total: {{ $totalPrice }}</strong>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<button type="button" class="btn btn-success">Отправить</button>
		</div>
	</div>
	
	
@else
	<div class="row">
		<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
			<h2>Вы еще не выбрали товар. В корзине нет товара!</h2>
		</div>
	</div>
@endif