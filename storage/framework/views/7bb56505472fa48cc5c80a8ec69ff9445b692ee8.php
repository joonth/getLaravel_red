<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('sessions.store')); ?>" method="POST" role="form" class="form__auth">
        <?php echo csrf_field(); ?>


        <div class="page-header">
            <h4>로그인</h4>
            <p class="text-muted">
                깃허브 계정으로 로그인하세요. <?php echo e(config('app.name')); ?> 계정으로 로그인할 수도 있습니다.
            </p>
        </div>


        <?php if($return = request('return')): ?>
            <input type="hidden" name="return" value="<?php echo e($return); ?>">
        <?php endif; ?>



        <hr>

        <div class="form-group">
            <a class="btn btn-default btn-lg btn-block" href="<?php echo e(route('social.login',['github'])); ?>">
                <strong><i class="fa fa-github"></i>Github 계정으로 로그인하기</strong>
            </a>
        </div>

        <div class="form-group" <?php echo e($errors->has('email') ? 'has-error' : ''); ?>>
            <input type="email" name="email" class="form-control" placeholder="이메일" value="<?php echo e(old('email')); ?>" autofocus>
            <?php echo $errors -> first('email','<span class="form-error">:message</span>'); ?>

        </div>

        <div class="form-group" <?php echo e($errors->has('password') ? 'has-error' : ''); ?>>
            <input type="password" name="password" class="form-control" placeholder="패스워드" value="<?php echo e(old('password')); ?>" autofocus>
            <?php echo $errors -> first('password','<span class="form-error">:message</span>'); ?>

        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="<?php echo e(old('remember',1)); ?>" checked>
                    로그인 기억하기
                    <span class="text-danger">
                        (공용 컴퓨터에서는 사용하지 마세요!)
                    </span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
                로그인
            </button>
        </div>

        <div>
            <p class="text-center"> 회원이 아니라면?
                <a href="<?php echo e(route('users.create')); ?>">
                    가입하세요.
                </a>
            </p>
            <p class="text-center">
                <a href="<?php echo e(route('remind.create')); ?>">
                    비밀번호를 잊으셨나요?
                </a>
            </p>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>