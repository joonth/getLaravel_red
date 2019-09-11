<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('reset.store')); ?>" method="POST" role="form" class="form__auth">
        <?php echo csrf_field(); ?>


        <input type="hidden" name="token" value="<?php echo e($token); ?>">

        <div class="page-header">
            <h4>비밀번호 바꾸기</h4>
            <p class="text-muted">
                회원가입했던 이메일을 입력하고, 새로운 비밀번호를 입력하세요.
            </p>
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="이메일" value="<?php echo e(old('email')); ?>" autofocus>
            <?php echo $errors->first('email', '<span class="form-error">:message</span>'); ?>

        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="새로운 비밀번호">
            <?php echo $errors->first('password', '<span class="form-error">:message</span>'); ?>

        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="비밀번호 확인">
            <?php echo $errors->first('password_confirmation', '<span class="form-error">:message</span>'); ?>

        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">
            비밀번호 바꾸기
        </button>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>