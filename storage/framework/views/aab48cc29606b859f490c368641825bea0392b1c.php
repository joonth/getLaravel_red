<?php $__env->startSection('content'); ?>
    <?php
        $viewName = 'articles.show';
    ?>

    <div class="page-header">
        <h4>
            <a href="<?php echo e(route('articles.index')); ?>">
                포럼
            </a>
            <small>
                / <?php echo e($article->title); ?>

            </small>
        </h4>
    </div>

    <div class="row container__article">
        <div class="col-md-3">
            <aside>
                <?php echo $__env->make('tags.partial.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </aside>
        </div>
        <div class="col-md-9">
            <div class="page-header">
                <h4>포럼 <small>/<?php echo e($article->title); ?></small></h4>
            </div>

            <article data-id="<?php echo e($article->id); ?>">
                <?php echo $__env->make('articles.partial.article',compact('article'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <p><?php echo markdown($article->content); ?></p>
                <?php echo $__env->make('tags.partial.list', ['tags' => $article->tags], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </article>

            <div class="text-right action__article">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$article)): ?>
                    <a href="<?php echo e(route('articles.edit',$article->id)); ?>" class="btn btn-info">
                        <i class="fa fa-pencil"></i>글 수정
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete',$article)): ?>
                    <button class="btn btn-danger button__delete">
                        <i class="fa fa-trash-o"></i>글 삭제
                    </button>
                <?php endif; ?>
                <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-default">
                    <i class="fa fa-list"></i> 글 목록
                </a>
            </div>
            <div class="container__comment">
                <?php echo $__env->make('comments.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $.ajaxSetup({
           headers:{
               'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
           }
        });

        $('.button__delete').on('click',function (e) {
           var articleId = $('article').data('id');

           if(confirm('글을 삭제합니다.')){
               $.ajax({
                   type:'DELETE',
                   url: '/articles/' + articleId
               }).then(function () {
                   window.location.href = '/articles';
               });
           }
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>