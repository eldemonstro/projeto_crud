<?php $__env->startSection('title', 'Editar Pedido'); ?>
<?php $__env->startSection('path', 'http://localhost:8000'); ?>
<?php $__env->startSection('content'); ?>
<div class='row'>
	<div class='col-md-2'></div>
	<div class='col-md-8'>
		<?php echo Form::open(['action' => ['PedidoController@update', $pedido -> id], 'method' => 'POST']); ?>

		<h1>Editando o pedido de id: <?php echo e($pedido -> id); ?></h1>
		<div class="well well-sm">
			<small>Pedido: <?php echo e($pedido -> id); ?> Cliente: <?php echo e($pedido -> clientes['nome']); ?> Produto: <?php echo e($pedido -> produtos['nome']); ?> </small>
		</div>
		<hr>
		<div class='form-group'>
			<label for='id_cliente'>Escolha o cliente</label>
			<select name='id_cliente' id='id_cliente' class="form-control">
				<option value="<?php echo e($pedido -> id_cliente); ?>" selected class='active'><?php echo e($pedido -> clientes['nome']); ?></option>
				<?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value='<?php echo e($cliente -> id); ?>'><?php echo e($cliente -> nome); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</select>
		</div>
		<div class='form-group'>
			<label for='id_produto'>Escolha o produto</label>
			<select name='id_produto' id='id_produto' class="form-control">
				<option value="<?php echo e($pedido -> id_produto); ?>" selected><?php echo e($pedido -> produtos['nome']); ?></option>
				<?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value='<?php echo e($produto -> id); ?>'><?php echo e($produto -> nome); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</select>
		</div>
		<div class='form-group'>
			<button type='submit' class='btn btn-success'>Salvar edição</button>
		</div>
		<?php echo e(Form::hidden('_method','PUT')); ?>

		<?php echo Form::close(); ?>

	</div>
	<div class='col-md-2'>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>