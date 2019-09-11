<?php
    $size = isset($size) ? $size : 48 ;
?>

<?php if(isset($user) and $user): ?>
    <a class="pull-left" href="<?php echo e(gravatar_profile_url($user->email)); ?>">
        <img class="media-object img-thumbnail" src="<?php echo e(gravatar_url($user->email,$size)); ?>" alt="<?php echo e($user->name); ?>">
    </a>
<?php else: ?>
    <a class="pull-left" href="<?php echo e(gravata_profile_url('unknown@example.com')); ?>">
        <img class="media-object img-thumbnail" src="<?php echo e(gravatar_url('unknown@example.com',$size)); ?>" alt="Unknown User">
    </a>
<?php endif; ?>