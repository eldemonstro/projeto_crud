<?php $__env->startSection('title', 'Editar Produto'); ?>
<?php $__env->startSection('path', 'http://localhost:8000'); ?>
<?php $__env->startSection('content'); ?>
	<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-8'>

			<?php echo Form::open(['action' => ['ProdutoController@update', $produto -> id], 'method' => 'POST']); ?>

			<div class='form-group'>
				<h1>Editando Produto: <?php echo e($produto -> nome); ?> </h1>
				<div class="well well-sm">
				<small>ID produto: <?php echo e($produto -> id); ?> Nome: <?php echo e($produto -> nome); ?> Preço: R$<?php echo e($produto -> preco); ?> </small>
				</div>
				<hr>
				<?php echo e(Form::label('nome', 'Nome Produto')); ?>

				<?php echo e(Form::text('nome', $produto -> nome, ['class' => 'form-control', 'placeholder' => '$produto -> nome'])); ?>

			</div>
			<?php echo e(Form::label('preco', 'Preço do Produto')); ?>

			<div class='form-group'>

				<div class='input-group'>
					<div class="input-group-addon">R$</div>
					<?php echo e(Form::number('preco', $produto -> preco, ['class' => 'form-control', 'step' => '0.01','placeholder' => $produto -> preco])); ?>

				</div>
			</div>
			<div class='form-group'>
				<?php echo e(Form::hidden('_method','PUT')); ?>

				<?php echo e(Form::submit('Salvar edição', ['class'=>'btn btn-success'])); ?>

			</div>


			<?php echo Form::close(); ?>

		</div>
		<div class='col-md-2'></div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>