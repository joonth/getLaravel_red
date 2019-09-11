<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('remind.store')); ?>" method="POST" role="form" class="form__auth">
        <?php echo csrf_field(); ?>


        <div class="page-header">
            <h4>비밀번호 바꾸기 신청</h4>
            <p class="text_muted">
                회원가입한 이메일로 신청하신 후, 메일박스를 확인하세요.
            </p>
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="이메일" value="<?php echo e(old('email')); ?>" autofocus>
            <?php echo $errors->first('email', '<span class="form-error">:message</span>'); ?>

        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">
            비밀번호 바꾸기 메일 발송
        </button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>