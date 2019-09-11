<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('users.store')); ?>" method="POST" class="form__auth">
        <?php echo csrf_field(); ?>


        <div class="form-group <?php echo e($errors -> has('name') ? 'has-error' : ''); ?>">
            <input type="text" name="name" class="form-control" placeholder="이름" value="<?php echo e(old('name')); ?>" autofocus>
            <?php echo $errors->first('name','<span class="form-error">:message</span>'); ?>

        </div>

        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
            <input type="email" name="email" class="form-control" placeholder="이메일" value="<?php echo e(old('email')); ?>">
            <?php echo $errors -> first('email', '<span class="form-error">:message</span>'); ?>

        </div>

        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
            <input type="password" name="password" class="form-control" placeholder="패스워드" value="<?php echo e(old('password')); ?>">
            <?php echo $errors -> first('password', '<span class="form-error">:message</span>'); ?>

        </div>

        <div class="form-group <?php echo e($errors->has('password') ? 'has-error':''); ?>">
            <input type="password" name="password_confirmation" class="form-control" placeholder="비밀번호 확인">
            <?php echo $errors->first('password_confirmation','<span class="form-error">:message</span>'); ?>

        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-lg tn -block" type="submit">
                가입하기
            </button>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>