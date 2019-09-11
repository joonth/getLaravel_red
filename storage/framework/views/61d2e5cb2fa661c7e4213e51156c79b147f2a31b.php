<?php

    $voted = null;

    if($currentUser){
    $voted = $comment -> votes->contains('user_id',$currentUser->id) ? 'disabled="disabled"' : null;

    }

?>


    <div class="media item__comment <?php echo e($isReply ? 'sub' : 'top'); ?>" data-id="<?php echo e($comment->id); ?>" id="comment_<?php echo e($comment->id); ?>">
          <?php echo $__env->make('users.partial.avatar',['user'=>$comment->user,'size'=>32], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="media-body">
       <h5 class="media-heading">
           <a href="<?php echo e(gravatar_profile_url($comment->user->email)); ?>">
               <?php echo e($comment -> user -> name); ?>

           </a>
           <small>
               <?php echo e($comment->created_at->diffForHumans()); ?>

           </small>
       </h5>

       <div class="content__comment">
           <?php echo markdown($comment -> content); ?>

       </div>

       <div class="action__comment">
          <?php if($currentUser): ?>
              <button class="btn__vote__comment" data-vote="up" title="좋아" <?php echo e($voted); ?>>
                  <i class="fa fa-chevron-up"></i>
                  <span><?php echo e($comment->up_count); ?></span>
              </button>

              <span> | </span>

              <button class="btn__vote__comment" data-vote="down" title="싫어" <?php echo e($voted); ?>>
                 <i class="fa fa-chevron-down"></i> <span><?php echo e($comment -> down_count); ?></span>
              </button>

          <?php endif; ?>
       </div>
    </div>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$comment)): ?>
            <button class="btn__delete__comment">댓글 삭제</button>
            <button class="btn__edit__comment">댓글 수정</button>
        <?php endif; ?>

        <?php if($currentUser): ?>
            <button class="btn__reply__comment">답글 쓰기</button>
        <?php endif; ?>
    </div>

    <?php if($currentUser): ?>
        <?php echo $__env->make('comments.partial.create',['parentId'=>$comment->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$comment)): ?>
        <?php echo $__env->make('comments.partial.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo $__env->make('comments.partial.comment',[
        'comment'=>$reply,
        'isReply'=> true,
        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
</div>

</div>