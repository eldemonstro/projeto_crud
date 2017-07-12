@extends('layouts.principal')
@section('title', 'Clientes')
@section('path', 'http://localhost:8000')
@section('content')
<div class='row'>

	<div class='col-md-4'>

		{!! Form::open(['action' => 'ClienteController@store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
		<div class='form-group'>
			<h1>Cadastrar cliente</h1>
			<hr>
			{{Form::label('nome', 'Nome cliente')}}
			{{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome do cliente', 'required' => '', 'minlength' => '3'])}}
		</div>
		<div class='form-group'>
			{{Form::label('email', 'Email do cliente')}}
			{{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email do cliente', 'required' => ''])}}
		</div>
		<div class='form-group'>
			{{Form::label('fone', 'Telefone do cliente')}}
			{{Form::text('fone', '', ['class' => 'form-control  phone_with_ddd', 'placeholder' => 'Telefone do cliente', 'required' => ''])}}
		</div>

		<div class='form-group'>
			{{Form::submit('Cadastrar', ['class'=>'btn btn-success'])}}
		</div>


		{!! Form::close() !!}
	</div>
	<div class='col-md-8'>
		<h1>Cliente já Cadastrados</h1>
		<hr>
		@if(count($clientes) > 0)
		<table class="table table-hover">
			<thead>
				<th>ID</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Telefone</th>
				<th>Ação</th>
			</thead>
			<tbody>
				@foreach ($clientes as $cliente)
				<tr>
					<td>{{$cliente -> id}}</td>
					<td>{{$cliente -> nome}}</td>
					<td>{{$cliente -> email}}</td>
					<td>{{$cliente -> fone}}</td>
					<td class='td-acao'>
						<span class='botao'><a href="/clientes/{{$cliente -> id}}/edit" class="btn btn-primary btn-sm ">Editar</a></span>
					<span class='botao'>{!!Form::open(['action' => ['ClienteController@destroy', $cliente->id], 'method' => 'POST'])!!} {{Form::hidden('_method', 'DELETE')}}{{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}{!!Form::close()!!} </span></td>
					</tr>


					<!-- MODAL DE EDIÇÃO DO CLIENTE 

					<div class="modal fade" id="modal{{$cliente -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">New message</h4>
								</div>
								<div class="modal-body">
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
									<div class="modal-footer">
										<div class='form-group'>
											{{Form::submit('Salvar edição', ['class'=>'btn btn-success'])}}
										</div>
									</div>
									<td style="display: none" id='id'>{{$cliente -> id}}</td>


									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
				</div>

				FIM DO MODAL -->
				@endforeach

			</tbody>
		</table>
		{{$clientes->render()}}
		@else
		<h2>Nenhum cliente cadastrado ainda</h2>
		@endif
	</div>
</div>
@endsection
