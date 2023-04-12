<?php $__env->startSection('content'); ?>
    <div class="container">
        <form method="post" action="<?php echo e(route('auth')); ?>">
            <div class="col-md-10 form_reg">
                <?php echo csrf_field(); ?>
                <div class="input-group input-group-sm">
                    <span class="info col-sm-4 input-group-text">Логин</span>
                    <input name="login" class="form-control" value="<?php echo e(old('login')); ?>"/>
                    <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="form-control error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="input-group input-group-sm form-group mt-2">
                    <span class="info col-sm-4 input-group-text">Пароль</span>
                    <input type="password" name="Password" class="form-control"/>
                    <div class="icon_pas"></div>
                    <?php $__errorArgs = ['Password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="form-control error"><?php echo e($message); ?></span>
                    <?php endif; ?>
                </div>
                <div class="input-group input-group-sm form-group mt-2">
                    <span class="info col-sm-4 input-group-text">Запомнить меня</span>
                    <input  value="true" id="remember" name="remember" type="checkbox"/>
                </div>
                <br/>
                <div class="form-group">
                    <input type="submit" value="Войти" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
    <script>
        let input_pas = document.getElementsByName('Password')[0];
        document.getElementsByClassName('icon_pas')[0].addEventListener('click',function(){
            if(input_pas.type == 'password'){
                input_pas.type = 'text';
            }
            else{
                input_pas.type = 'password';
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index' ,['title'=>'Войти'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/Account/login.blade.php ENDPATH**/ ?>