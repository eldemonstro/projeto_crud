@extends('layouts.principal')
@section('title', 'Editar Pedido')
@section('path', 'http://localhost:8000')
@section('content')
<div class='row'>
	<div class='col-md-2'></div>
	<div class='col-md-8'>
		{!! Form::open(['action' => ['PedidoController@update', $pedido -> id], 'method' => 'POST', 'data-parsley-validate' => '']) !!}
		<h1>Editando o pedido de id: {{$pedido -> id}}</h1>
		<div class="well well-sm">
			<small>Pedido: {{$pedido -> id}} Cliente: {{$pedido -> clientes['nome']}} Produto: {{$pedido -> produtos['nome']}} </small>
		</div>
		<hr>
		<div class='form-group'>
			<label for='id_cliente'>Escolha o cliente</label>
			<select name='id_cliente' id='id_cliente' class="form-control" required >
				<option value="{{$pedido -> id_cliente}}" selected class='active'>{{$pedido -> clientes['nome']}}</option>
				@foreach($clientes as $cliente)
				<option value='{{$cliente -> id }}'>{{$cliente -> nome }}</option>
				@endforeach

			</select>
		</div>
		<div class='form-group'>
			<label for='id_produto'>Escolha o produto</label>
			<select name='id_produto' id='id_produto' class="form-control" required>
				<option value="{{$pedido -> id_produto}}" selected>{{$pedido -> produtos['nome']}}</option>
				@foreach($produtos as $produto)
				<option value='{{$produto -> id }}'>{{$produto -> nome }}</option>
				@endforeach

			</select>
		</div>
		<div class='form-group'>
			<button type='submit' class='btn btn-success'>Salvar edição</button>
		</div>
		{{Form::hidden('_method','PUT')}}
		{!! Form::close() !!}
	</div>
	<div class='col-md-2'>
	</div>
</div>
@endsection