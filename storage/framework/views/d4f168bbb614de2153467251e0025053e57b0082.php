<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name','Laravel')); ?></title>
    <link rel="stylesheet" href="<?php echo e(elixir("css/app.css")); ?>">
    <?php echo $__env->yieldContent('style'); ?>
</head>
<body id="app-layout">
    <?php echo $__env->make('layouts.partial.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container">
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('layouts.partial.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script src="<?php echo e(elixir("js/app.js")); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>