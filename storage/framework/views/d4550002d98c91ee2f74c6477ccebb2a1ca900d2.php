<?php $__env->startSection('title', 'Editar Produto'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-8'>

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
			<div class='form-group'>
				<?php echo e(Form::hidden('_method','PUT')); ?>

				<?php echo e(Form::submit('Salvar edição', ['class'=>'btn btn-success'])); ?>

			</div>


			<?php echo Form::close(); ?>

		</div>
		<div class='col-md-2'></div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>