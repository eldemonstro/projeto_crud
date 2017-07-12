@extends('layouts.principal')
@section('title', 'Home')
@section('content')
<div class="container">
	
	<div class='row'>	
		<div class='col-md-4'>	
			<button type="button" class='btn btn-block btn-primary' data-toggle='modal' data-target='#modal-cliente'> Cadastro Rapido de <strong>Cliente</strong></button>
		</div>
		<div class='col-md-4'>	
			<button type="button" class='btn btn-block btn-info' data-toggle='modal' data-target='#modal-produto'> Cadastro Rapido de <strong>Produto</strong></button>
		</div>
		<div class='col-md-4'>	
			@if(count($clientes) > 0)
				@if(count($produtos) > 0)
			<button type="button" class='btn btn-block btn-warning' data-toggle='modal' data-target='#modal-pedido'> Cadastro Rapido de <strong>Pedido</strong></button>
				@endif
			@else
			<p>
				Só é possivel adicionar um pedido se já houver pelo menos 1 cliente e 1 produto cadastrado, quando tiver concluido os cadastro atualize a pagina.
			</p>
			@endif

		</div>
	</div>


	<!--#################################### Modais ######################## -->

	<!-- ####################################Modaal CLIENTE####################################     -->

	<div class="modal fade " id="modal-cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Cadastrar cliente</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['id' => 'form-modal-cliente', 'class' => 'form-modal-cliente ', 'data-parsley-validate' => '']) !!}
					<div class='form-group'>
						{{Form::label('nome', 'Nome cliente')}}
						{{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome do cliente', 'required' => '', 'minlength' => '3'])}}
					</div>
					<div class='form-group'>
						{{Form::label('email', 'Email do cliente')}}
						{{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email do cliente', 'required' => ''])}}
					</div>
					<div class='form-group'>
						{{Form::label('fone', 'Telefone do cliente')}}
						{{Form::text('fone', '', ['class' => 'form-control phone_with_ddd', 'placeholder' => 'Telefone do cliente', 'required' => '', 'minlength' => '13'])}}
					</div>



					<div class="modal-footer">
						<div class='form-group'>
							{{Form::submit('Cadastrar', ['class'=>'btn btn-success' ])}}
						</div>
						{!! Form::close() !!}
					</div>
					<div class="alert alert-success mensagem hidden" >	
						Cliente	Adicionado com sucesso <button  class='btn btn-sm btn-danger btn-dismiss' data-dismiss="modal" role="alert">	Fechar Janela</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ####################################Modaal PRODUTO####################################     -->
	<div class="modal fade " id="modal-produto" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Cadastrar Produto</h4>
				</div>
				<div class="modal-body">

					{!! Form::open(['id' => 'form-modal-produto', 'class' => 'form-modal-produto', 'data-parsley-validate' => '']) !!}
					<div class='form-group'>
						{{Form::label('nome', 'Nome do Produto')}}
						{{Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome do produto', 'required' => '', 'minlength' => '2'])}}
					</div>
					<div class='form-group'>
						{{Form::label('preco', 'Preço do Produto')}}
						<div class='input-group'>
							<div class="input-group-addon">R$</div>
							{{Form::number('preco', '', ['class' => 'form-control money2', 'step' => '0.01', 'placeholder' => 'Preço Do Produto', 'required' => '', 'data-parsley-type' => 'number', 'min' => '0.01'])}}
						</div>
					</div>
					<div class="modal-footer">
						<div class='form-group'>
							{{Form::submit('Cadastrar', ['class'=>'btn btn-success'])}}
							{!! Form::close() !!}
						</div>
					</div>
					<div class="alert alert-success mensagem hidden" >	
						Produto Adicionado com sucesso <button  class='btn btn-sm btn-danger btn-dismiss' data-dismiss="modal" role="alert">	Fechar Janela</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ####################################Modaal PEDIDOS ####################################     -->
	<div class="modal fade " id="modal-pedido" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Cadastrar Pedido</h4>
				</div>
				<div class="modal-body">

					{!! Form::open([ 'id' => 'form-modal-pedido', 'class' => 'form-modal-pedido','data-parsley-validate' => '']) !!}
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
					<div class="modal-footer">
						<div class='form-group'>
							{{Form::submit('Cadastrar', ['class'=>'btn btn-success'])}}
							{!! Form::close() !!}
						</div>
					</div>
					<div class="alert alert-success mensagem hidden" >	
						Produto Adicionado com sucesso <button  class='btn btn-sm btn-danger btn-dismiss' data-dismiss="modal" role="alert">	Fechar Janela</button>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>
@endsection
