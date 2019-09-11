<div class="media media__create__comment <?php echo e(isset($parentId) ? 'sub' : 'top'); ?>">

    <?php echo $__env->make('users.partial.avatar',['user'=>$currentUser,'size'=> 32], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="media-body">
        <form method="POST" action="<?php echo e(route('articles.comments.store',$article->id)); ?>" class="form-horizontal">
            <?php echo csrf_field(); ?>

            <?php if(isset($parentId)): ?>
                <input type="hidden" name="parent_id" value="<?php echo e($parentId); ?>">
            <?php endif; ?>

            <div class="form-group <?php echo e($errors->has('content') ? 'has-error' : ''); ?>">
                <textarea name="content" class="form-control"><?php echo e(old('content')); ?></textarea>
                <?php echo $errors->first('content', '<span class="form-error">:message</span>'); ?>

            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">
                    전송하기
                </button>
            </div>

        </form>
    </div>
</div>