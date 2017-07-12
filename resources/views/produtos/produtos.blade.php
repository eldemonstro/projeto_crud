@extends('layouts.principal')
@section('title', 'Produtos')
@section('content')
	<div class='row'>

		<div class='col-md-4'>

			{!! Form::open(['action' => 'ProdutoController@store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
			<div class='form-group'>
				<h1>Criar produtos</h1>
				<hr>
				{{Form::label('nome', 'Nome Produto')}}
				{{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome Do Produto', 'required' => '', 'minlength' => '2'])}}
			</div>
			{{Form::label('preco', 'Preço do Produto')}}
			<div class='form-group'>

				<div class='input-group'>
					<div class="input-group-addon">R$</div>
					{{Form::number('preco', '', ['class' => 'form-control money2', 'step' => '0.01', 'placeholder' => 'Preço Do Produto', 'required' => '', 'data-parsley-type' => 'number', 'min' => '0.01'])}}
				</div>
			</div>
			<div class='form-group'>
				{{Form::submit('Cadastrar', ['class'=>'btn btn-success'])}}
			</div>


			{!! Form::close() !!}
		</div>
		<div class='col-md-8'>
			<h1>Produtos já Cadastrados</h1>
			<hr>
			@if(count($produtos) > 0)
				<table class="table table-hover">
					<thead>
						<th>ID</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Ação</th>
					</thead>
					<tbody>
						@foreach ($produtos as $produto)
						<tr>
							<td>{{$produto -> id}}</td>
							<td>{{$produto -> nome}}</td>
							<td>R${{$produto -> preco}}</td>
							<td class='td-acao'><span class='botao'><a href="/produtos/{{$produto -> id}}/edit" class="btn btn-primary btn-sm ">Editar</a></span><span class='botao'>{!!Form::open(['action' => ['ProdutoController@destroy', $produto->id], 'method' => 'POST'])!!} {{Form::hidden('_method', 'DELETE')}}{{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}{!!Form::close()!!} </span></td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
				{{$produtos->links()}}
			@else
				<h2>Nenhum Produto Cadastrado ainda</h2>
			@endif
		</div>
	</div>
@endsection
