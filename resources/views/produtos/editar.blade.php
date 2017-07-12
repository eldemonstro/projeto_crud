@extends('layouts.principal')
@section('title', 'Editar Produto')
@section('path', 'http://localhost:8000')
@section('content')
	<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-8'>

			{!! Form::open(['action' => ['ProdutoController@update', $produto -> id], 'method' => 'POST']) !!}
			<div class='form-group'>
				<h1>Editando Produto: {{$produto -> nome}} </h1>
				<div class="well well-sm">
				<small>ID produto: {{$produto -> id}} Nome: {{$produto -> nome}} Preço: R${{$produto -> preco}} </small>
				</div>
				<hr>
				{{Form::label('nome', 'Nome Produto')}}
				{{Form::text('nome', $produto -> nome, ['class' => 'form-control', 'placeholder' => '$produto -> nome'])}}
			</div>
			{{Form::label('preco', 'Preço do Produto')}}
			<div class='form-group'>

				<div class='input-group'>
					<div class="input-group-addon">R$</div>
					{{Form::number('preco', $produto -> preco, ['class' => 'form-control', 'step' => '0.01','placeholder' => $produto -> preco])}}
				</div>
			</div>
			<div class='form-group'>
				{{Form::hidden('_method','PUT')}}
				{{Form::submit('Salvar edição', ['class'=>'btn btn-success'])}}
			</div>


			{!! Form::close() !!}
		</div>
		<div class='col-md-2'></div>
	</div>

@endsection
