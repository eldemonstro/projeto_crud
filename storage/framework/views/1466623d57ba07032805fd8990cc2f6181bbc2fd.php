<?php $__env->startSection('title', 'Produtos'); ?>
<?php $__env->startSection('content'); ?>
	<div class='row'>

		<div class='col-md-4'>

			<?php echo Form::open(['action' => 'ProdutoController@store', 'method' => 'POST', 'data-parsley-validate' => '']); ?>

			<div class='form-group'>
				<h1>Criar produtos</h1>
				<hr>
				<?php echo e(Form::label('nome', 'Nome Produto')); ?>

				<?php echo e(Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome Do Produto', 'required' => '', 'minlength' => '2'])); ?>

			</div>
			<?php echo e(Form::label('preco', 'Preço do Produto')); ?>

			<div class='form-group'>

				<div class='input-group'>
					<div class="input-group-addon">R$</div>
					<?php echo e(Form::number('preco', '', ['class' => 'form-control money2', 'step' => '0.01', 'placeholder' => 'Preço Do Produto', 'required' => '', 'data-parsley-type' => 'number', 'min' => '0.01'])); ?>

				</div>
			</div>
			<div class='form-group'>
				<?php echo e(Form::submit('Cadastrar', ['class'=>'btn btn-success'])); ?>

			</div>


			<?php echo Form::close(); ?>

		</div>
		<div class='col-md-8'>
			<h1>Produtos já Cadastrados</h1>
			<hr>
			<?php if(count($produtos) > 0): ?>
				<table class="table table-hover">
					<thead>
						<th>ID</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Ação</th>
					</thead>
					<tbody>
						<?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($produto -> id); ?></td>
							<td><?php echo e($produto -> nome); ?></td>
							<td>R$<?php echo e($produto -> preco); ?></td>
							<td class='td-acao'><span class='botao'><a href="/produtos/<?php echo e($produto -> id); ?>/edit" class="btn btn-primary btn-sm ">Editar</a></span><span class='botao'><?php echo Form::open(['action' => ['ProdutoController@destroy', $produto->id], 'method' => 'POST']); ?> <?php echo e(Form::hidden('_method', 'DELETE')); ?><?php echo e(Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])); ?><?php echo Form::close(); ?> </span></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</tbody>
				</table>
				<?php echo e($produtos->links()); ?>

			<?php else: ?>
				<h2>Nenhum Produto Cadastrado ainda</h2>
			<?php endif; ?>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>