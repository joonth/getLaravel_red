
<div class="page-header">
    <h4>댓글</h4>
</div>
<div class="form__new__comment">
    <?php if($currentUser): ?>
        <?php echo $__env->make('comments.partial.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('comments.partial.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
</div>

<div class="list__comment">
    <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo $__env->make('comments.partial.comment',[
        'parentId' => $comment->id,
        'isReply' => false,
        'hasChild'=> $comment->replies->count(),
        'isTrashed'=> $comment->trashed(),

        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
</div>

<?php $__env->startSection('script'); ?>
    ##parent-placeholder-cb5346a081dcf654061b7f897ea14d9b43140712##
    <script>
        $('.btn__delete__comment').on('click',function(e){
            var commentId = $(this).closest('.item__comment').data('id'),
                articleId = $('article').data('id');

            if(confirm('댓글을 삭제합니다.')){
                $.ajax({
                    type:'POST',
                    url: "/comments/" + commentId,
                    data: {
                        _method: "DELETE"
                    }
                }).then(function () {
                   $('#comment_' + commentId).fadeOut(1000, function () {
                        $(this).remove();
                   });
                });
            }
        })


        $('.btn__vote__comment').on('click',function (e) {
            var self = $(this),
                commentId = self.closest('.item__comment').data('id');

            $.ajax({
                type: 'POST',
                url: '/comments/' + commentId + '/votes',
                data:{
                    vote: self.data('vote')
                }
            }).then(function(data){
               self.find('span').html(data.value).fadeIn();
               self.attr('disabled','disabled');
               self.siblings().attr('disabled','disabled');
            });
        })
    </script>

<?php $__env->stopSection(); ?>