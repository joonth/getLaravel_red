<footer class="container">
    <ul class="list-inline pull-right">
        <li><i class="fa fa-language"></i></li>
        <?php $__currentLoopData = config('project.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li <?php echo ($locale == $currentLocale) ?  'class="active"' : ''; ?>>
                <a href="<?php echo e(route('locale', ['locale'=>$locale, 'return' =>urlencode($currentUrl)])); ?>">
                    <?php echo e($language); ?>

                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>


    <div>
        &copy; <?php echo e(date('Y')); ?>

        <a href="<?php echo e(config('project.url')); ?>">
            <?php echo e(config('app.name')); ?>

        </a>
    </div>
</footer>