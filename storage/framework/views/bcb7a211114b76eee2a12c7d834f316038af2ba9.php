<?php $__env->startSection('style'); ?>
    <style>
        body{background: green;
            color: white;}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>








<?php
        $items =[];
?>


    <p>자식뷰의 content 섹션</p>
    ##parent-placeholder-040f06fd774092478d450774f5ba30c5da78acc8##
    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        alert('script section');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>