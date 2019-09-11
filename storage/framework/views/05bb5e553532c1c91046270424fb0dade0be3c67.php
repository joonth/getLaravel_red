<p class="lead">
    <i class="fa fa-tags"></i>태그
</p>

<ul class="list-unstyled">
    <?php $__currentLoopData = $allTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li <?php echo str_contains(request()->path(), $tag->slug) ? 'class="active"' : ''; ?>>
            <a href="<?php echo e(route('tags.articles.index',$tag->slug)); ?>">
                <?php echo e($tag->name); ?>

                <?php if($count = $tag->articles->count()): ?>
                    <span class="badge badge-default"><?php echo e($count); ?></span>
                <?php endif; ?>
            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>