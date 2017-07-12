@extends('layouts.principal')
@section('title', 'Produtos')
@section('content')
<div class='row'>

	<div class='col-md-4'>
		@if(count($clientes) > 0 && count($produtos) > 0)
		
		
		{!! Form::open(['action' => 'PedidoController@store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
		<h1>Cadastro de pedidos</h1>
		<hr>
		<div class='form-group'>
			<label for='id_cliente'>Escolha o cliente</label>
			<select name='id_cliente' id='id_cliente' class="form-control">
				@foreach($clientes as $cliente)
				<option value='{{$cliente -> id }}'>{{$cliente -> nome }}</option>
				@endforeach

			</select>
		</div>
		<div class='form-group'>
			<label for='id_produto'>Escolha o produto</label>
			<select name='id_produto' id='id_produto' class="form-control" required>
				@foreach($produtos as $produto)
				<option value='{{$produto -> id }}'>{{$produto -> nome }}</option>
				@endforeach

			</select>
		</div>
		<div class='form-group'>
			<button type='submit' class='btn btn-success'>Cadastrar</button>
		</div>

		{!! Form::close() !!}
		@else
		<p>
			Só é possivel adicionar um pedido se já houver pelo menos 1 cliente e 1 produto cadastrado, quando tiver concluido os cadastro atualize a pagina.
		</p>
		@endif
	</div>
	<div class='col-md-8'>
		<h1>Pedidos já cadastrados</h1>
		<hr>
		@if(count($pedidos) > 0)
		<table class="table table-hover">
			<thead>
				<th>ID pedido</th>
				<th>Nome do cliente</th>
				<th>Nome do produto</th>

				<th>Ação</th>
			</thead>
			<tbody>
				@foreach ($pedidos as $pedido)
				<tr>
					<td>{{$pedido -> id}}</td>
					<td>{{$pedido -> clientes['nome']}}</td>
					<td>{{$pedido -> produtos['nome']}}</td>
					<td class='td-acao'><span class='botao'><a href="/pedidos/{{$pedido -> id}}/edit" class="btn btn-primary btn-sm ">Editar</a></span><span class='botao'>{!!Form::open(['action' => ['PedidoController@destroy', $pedido ->id], 'method' => 'POST'])!!} {{Form::hidden('_method', 'DELETE')}}{{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}{!!Form::close()!!} </span></td>
				</tr>
				@endforeach

			</tbody>
		</table>
		{{$pedidos -> render()}}
		@else
		<h2>Nenhum Pedido Cadastrado ainda</h2>
		@endif
	</div>
</div>
@endsection
