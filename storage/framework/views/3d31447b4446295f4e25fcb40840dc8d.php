<?php $__env->startSection('content'); ?>
<section class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.jpg')] bg-no-repeat bg-center">
    <div class="absolute"></div>
    <div class="container">
        <div class="flex justify-center">
            <div class="max-w-[400px] w-full m-auto p-6 bg-white rounded-md">
                <a href="<?php echo e(route('main')); ?>"><img src="<?php echo e(asset('image/icon/logo-icon-64.png')); ?>" class="mx-auto" alt=""></a>
                <h5 class="my-6 text-xl font-semibold">Войти</h5>
                <form method="post" action="<?php echo e(route('auth')); ?>" class="text-left">
                    <div class="grid grid-cols-1">
                        <?php echo csrf_field(); ?>
                        <div class="mb-4">
                            <label class="font-semibold" for="login">Логин:</label>
                            <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-slate-400 text-red-600 mb-0"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <input name="login" id="login" class="form-input mt-3" placeholder="user275" value="<?php echo e(old('login')); ?>" >
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="password">Пароль:</label>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-slate-400 text-red-600 mb-0"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <input name="password" id="password" type="password" class="form-input mt-3" placeholder="Pass12G_445_ds">
                        </div>

                        <div class="flex justify-between mb-4">
                            <div class="form-checkbox flex items-center mb-0">
                                <input name="remember" class="mr-2 border border-inherit w-[14px] h-[14px]" type="checkbox" value="true" id="remember">
                                <label class="text-slate-400" for="remember">Запомнить меня</label>
                            </div>

                        </div>

                        <div class="mb-4">
                            <input formaction="" type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full" value="Войти">
                        </div>

                        <div class="text-center">
                            <span class="text-slate-400 me-2">Нет аккаунта ?</span> <a href="<?php echo e(route('register')); ?>" class="text-black dark:text-white font-bold">Зарегистрироваться</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!--end section -->

<div class="fixed bottom-3 right-3">
    <a href="<?php echo e(redirect()->back()); ?>" class="back-button btn btn-icon bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-full"><i data-feather="arrow-left" class="h-4 w-4"></i></a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth' ,['title'=>'Войти'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/Account/sign_in.blade.php ENDPATH**/ ?>