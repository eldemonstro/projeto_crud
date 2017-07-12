<?php $__env->startSection('title', 'Produtos'); ?>
<?php $__env->startSection('content'); ?>
<div class='row'>

	<div class='col-md-4'>
		<?php if(count($clientes) > 0 && count($produtos) > 0): ?>
		
		
		<?php echo Form::open(['action' => 'PedidoController@store', 'method' => 'POST', 'data-parsley-validate' => '']); ?>

		<h1>Cadastro de pedidos</h1>
		<hr>
		<div class='form-group'>
			<label for='id_cliente'>Escolha o cliente</label>
			<select name='id_cliente' id='id_cliente' class="form-control">
				<?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value='<?php echo e($cliente -> id); ?>'><?php echo e($cliente -> nome); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</select>
		</div>
		<div class='form-group'>
			<label for='id_produto'>Escolha o produto</label>
			<select name='id_produto' id='id_produto' class="form-control" required>
				<?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value='<?php echo e($produto -> id); ?>'><?php echo e($produto -> nome); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</select>
		</div>
		<div class='form-group'>
			<button type='submit' class='btn btn-success'>Cadastrar</button>
		</div>

		<?php echo Form::close(); ?>

		<?php else: ?>
		<p>
			Só é possivel adicionar um pedido se já houver pelo menos 1 cliente e 1 produto cadastrado, quando tiver concluido os cadastro atualize a pagina.
		</p>
		<?php endif; ?>
	</div>
	<div class='col-md-8'>
		<h1>Pedidos já cadastrados</h1>
		<hr>
		<?php if(count($pedidos) > 0): ?>
		<table class="table table-hover">
			<thead>
				<th>ID pedido</th>
				<th>Nome do cliente</th>
				<th>Nome do produto</th>

				<th>Ação</th>
			</thead>
			<tbody>
				<?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($pedido -> id); ?></td>
					<td><?php echo e($pedido -> clientes['nome']); ?></td>
					<td><?php echo e($pedido -> produtos['nome']); ?></td>
					<td class='td-acao'><span class='botao'><a href="/pedidos/<?php echo e($pedido -> id); ?>/edit" class="btn btn-primary btn-sm ">Editar</a></span><span class='botao'><?php echo Form::open(['action' => ['PedidoController@destroy', $pedido ->id], 'method' => 'POST']); ?> <?php echo e(Form::hidden('_method', 'DELETE')); ?><?php echo e(Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])); ?><?php echo Form::close(); ?> </span></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</tbody>
		</table>
		<?php echo e($pedidos -> render()); ?>

		<?php else: ?>
		<h2>Nenhum Pedido Cadastrado ainda</h2>
		<?php endif; ?>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>