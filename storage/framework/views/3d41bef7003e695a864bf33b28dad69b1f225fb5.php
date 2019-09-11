<?php $__env->startSection('content'); ?>
    <?php
        $viewName = 'articles.show';
    ?>
    <div class="page-header">
        <h4>포럼<small>/ 글 목록</small></h4>
    </div>

    <div class="text-right">
        <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i> 새 글쓰기
        </a>


        <div class="btn-group sort__article">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-sort"></i> 목록 정렬 <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <?php $__currentLoopData = config('project.sorting'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li <?php echo request()->input('sort') == $column ? 'class="active"' : ''; ?>>
                        <?php echo link_for_sort($column,$text); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <aside>
                <?php echo $__env->make('articles.partial.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->make('tags.partial.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </aside>
        </div>
        <div class="col-md-9">
            <article>
                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php echo $__env->make('articles.partial.article',compact('article'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center text-danger">글이 없습니다.</p>
                <?php endif; ?>
            </article>

            <?php if($articles->count()): ?>
                <div class="text-center">
                    <?php echo $articles->appends (Request::except('page'))->render(); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>