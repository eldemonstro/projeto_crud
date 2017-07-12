<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>CRUD - <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo Html::style('css/parsley.css'); ?>

    <?php echo Html::style('css/main.css'); ?>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <strong>Home</strong>
                        </a>
                </div>
                <ul class='nav navbar-nav'>
                    <li ><a href="/produtos">Produtos</a></li>
                    <li ><a href="/clientes">Clientes</a></li>
                    <li ><a href="/pedidos">Pedidos</a></li>
                </ul>


            </div>
        </nav>
        <div class='container'>

        <?php echo $__env->make('layouts.mensagem', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo Html::script('js/parsley.js'); ?>

    <?php echo Html::script('js/pt-br.js'); ?>

    <?php echo Html::script('js/jquery.mask.min.js'); ?>

    <?php echo Html::script('js/main.js'); ?>

</body>
</html>
