<div class="media">
    <?php echo $__env->make('users.partial.avatar',['user' => $article->user], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="media-body">
        <h4 class="media-heading">
            <a href="<?php echo e(route('articles.show', $article->id)); ?>">
                <?php echo e($article->title); ?>

            </a>
        </h4>

       <p class="text-muted meta__article">
           By
           <a href="<?php echo e(gravatar_profile_url($article->user->email)); ?>">
               <?php echo e($article->user->name); ?>

           </a>

           <small>
                <?php echo e($article->created_at->diffForHumans()); ?>

               조회수 <?php echo e($article->view_count); ?>


               <?php if($article->comment_count >0): ?>
                댓글 <?php echo e($article->comment_count); ?>개
               <?php endif; ?>
           </small>
       </p>

        <?php if($viewName === 'articles.index'): ?>
          <?php echo $__env->make('tags.partial.list',['tags' => $article->tags], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>


        <?php if($viewName === 'article.show'): ?>
            <?php echo $__env->make('attachments.partial.list',['attachments'=>$article->attachments], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

    </div>
</div>