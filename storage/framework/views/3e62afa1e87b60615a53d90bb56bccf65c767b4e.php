<?php $__env->startSection('title', 'Clientes'); ?>
<?php $__env->startSection('path', 'http://localhost:8000'); ?>
<?php $__env->startSection('content'); ?>
<div class='row'>

	<div class='col-md-4'>

		<?php echo Form::open(['action' => 'ClienteController@store', 'method' => 'POST', 'data-parsley-validate' => '']); ?>

		<div class='form-group'>
			<h1>Cadastrar cliente</h1>
			<hr>
			<?php echo e(Form::label('nome', 'Nome cliente')); ?>

			<?php echo e(Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome do cliente', 'required' => '', 'minlength' => '3'])); ?>

		</div>
		<div class='form-group'>
			<?php echo e(Form::label('email', 'Email do cliente')); ?>

			<?php echo e(Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email do cliente', 'required' => ''])); ?>

		</div>
		<div class='form-group'>
			<?php echo e(Form::label('fone', 'Telefone do cliente')); ?>

			<?php echo e(Form::text('fone', '', ['class' => 'form-control  phone_with_ddd', 'placeholder' => 'Telefone do cliente', 'required' => ''])); ?>

		</div>

		<div class='form-group'>
			<?php echo e(Form::submit('Cadastrar', ['class'=>'btn btn-success'])); ?>

		</div>


		<?php echo Form::close(); ?>

	</div>
	<div class='col-md-8'>
		<h1>Cliente já Cadastrados</h1>
		<hr>
		<?php if(count($clientes) > 0): ?>
		<table class="table table-hover">
			<thead>
				<th>ID</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Telefone</th>
				<th>Ação</th>
			</thead>
			<tbody>
				<?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($cliente -> id); ?></td>
					<td><?php echo e($cliente -> nome); ?></td>
					<td><?php echo e($cliente -> email); ?></td>
					<td><?php echo e($cliente -> fone); ?></td>
					<td class='td-acao'>
						<span class='botao'><a href="/clientes/<?php echo e($cliente -> id); ?>/edit" class="btn btn-primary btn-sm ">Editar</a></span>
					<span class='botao'><?php echo Form::open(['action' => ['ClienteController@destroy', $cliente->id], 'method' => 'POST']); ?> <?php echo e(Form::hidden('_method', 'DELETE')); ?><?php echo e(Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])); ?><?php echo Form::close(); ?> </span></td>
					</tr>


					<!-- MODAL DE EDIÇÃO DO CLIENTE 

					<div class="modal fade" id="modal<?php echo e($cliente -> id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">New message</h4>
								</div>
								<div class="modal-body">
									<?php echo Form::open(['action' => ['ClienteController@update', $cliente -> id], 'method' => 'POST', 'data-parsley-validate' => '']); ?>

									<div class='form-group'>
										<h1>Editando Cliente</h1>
										<hr>
										<?php echo e(Form::label('nome', 'Nome do cliente')); ?>

										<?php echo e(Form::text('nome', $cliente -> nome, ['class' => 'form-control', 'placeholder' => '$cliente -> nome', 'required' => '', 'minlength' => '3'])); ?>

									</div>

									<div class='form-group'>
										<?php echo e(Form::label('email', 'Email do cliente')); ?>

										<?php echo e(Form::email('email', $cliente -> email, ['class' => 'form-control', 'placeholder' => '$cliente -> email', 'required' => ''])); ?>

									</div>
									<div class='form-group'>
										<?php echo e(Form::label('fone', 'Telefone do cliente')); ?>

										<?php echo e(Form::text('fone', $cliente -> fone, ['class' => 'form-control phone_with_ddd', 'placeholder' => '$cliente -> fone', 'required' => ''])); ?>

									</div>			
									<div class="modal-footer">
										<div class='form-group'>
											<?php echo e(Form::submit('Salvar edição', ['class'=>'btn btn-success'])); ?>

										</div>
									</div>
									<td style="display: none" id='id'><?php echo e($cliente -> id); ?></td>


									<?php echo Form::close(); ?>

								</div>
							</div>
						</div>
					</div>
				</div>

				FIM DO MODAL -->
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</tbody>
		</table>
		<?php echo e($clientes->render()); ?>

		<?php else: ?>
		<h2>Nenhum cliente cadastrado ainda</h2>
		<?php endif; ?>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>