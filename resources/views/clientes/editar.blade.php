@extends('layouts.principal')
@section('title', 'Editar Produto')
@section('content')
<div class="container">
	<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-8'>

			{!! Form::open(['action' => ['ClienteController@update', $cliente -> id], 'method' => 'POST', 'data-parsley-validate' => '']) !!}
			<div class='form-group'>
				<h1>Editando Cliente</h1>
				<hr>
				{{Form::label('nome', 'Nome do cliente')}}
				{{Form::text('nome', $cliente -> nome, ['class' => 'form-control', 'placeholder' => '$cliente -> nome', 'required' => '', 'minlength' => '3'])}}
			</div>

			<div class='form-group'>
				{{Form::label('email', 'Email do cliente')}}
				{{Form::email('email', $cliente -> email, ['class' => 'form-control', 'placeholder' => '$cliente -> email', 'required' => ''])}}
			</div>
			<div class='form-group'>
				{{Form::label('fone', 'Telefone do cliente')}}
				{{Form::text('fone', $cliente -> fone, ['class' => 'form-control phone_with_ddd', 'placeholder' => '$cliente -> fone', 'required' => ''])}}
			</div>			
			<div class='form-group'>
				{{Form::hidden('_method','PUT')}}
				{{Form::submit('Salvar edição', ['class'=>'btn btn-success'])}}
			</div>


			{!! Form::close() !!}
		</div>
		<div class='col-md-2'></div>
	</div>
</div>
@endsection
