<?php $__env->startSection('content'); ?>

<section class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.jpg')] bg-no-repeat bg-center">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
    <div class="container">
        <div class="flex justify-center">
            <div class="max-w-[400px] h-fit h-auto m-auto p-6 bg-white shadow-md  rounded-md">
                <a href="<?php echo e(route('main')); ?>"><img src="<?php echo e(asset('image/icon/logo-icon-64.png')); ?>" class="mx-auto" alt=""></a>
                <h5 class="my-6 text-xl font-semibold">Регистрация</h5>
                <form method="post" action="<?php echo e(route('save')); ?>" class="text-left">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-cols-1">
                        <div class="mb-4">
                            <label class="font-semibold" for="login">Логин:</label>
                            <?php if($errors->has('login')): ?>
                                <input name="login" id="login" type="text" class="form-input mt-3" placeholder="<?php echo e($errors->first('login')); ?>">
                            <?php else: ?>
                                <input name="login" id="login" type="text" class="form-input mt-3" placeholder="user275" value="<?php echo e(old('login')); ?>">
                            <?php endif; ?>

                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="tel_number">Номер телефона:</label>
                            <?php if($errors->has('tel_number')): ?>
                                <input name="tel_number" id="tel_number" type="text" class="form-input mt-3" placeholder="<?php echo e($errors->first('tel_number')); ?>">
                            <?php else: ?>
                                <input name="tel_number" id="tel_number" type="text" class="form-input mt-3" placeholder="33 475 58 94" value="<?php echo e(old('tel_number')); ?>">
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="password">Пароль:</label>
                            <?php if($errors->has('password')): ?>
                                <input name="password" id="password" type="password" class="form-input mt-3" placeholder="<?php echo e($errors->first('password')); ?>">
                            <?php else: ?>
                                <input name="password" id="password" type="password" class="form-input mt-3" placeholder="Pass12G_445_ds">
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="password_confirmation">Потверждение пароля:</label>
                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-input mt-3">
                        </div>

                        <div class="mb-4">
                            <input type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full" value="Зарегистрироваться">
                        </div>

                        <div class="text-center">
                            <span class="text-slate-400 me-2">Есть аккаунт ? </span> <a href="<?php echo e(route('login')); ?>" class="text-black dark:text-white font-bold">Войти</a>
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

<?php echo $__env->make('layouts.auth',['title'=>'Регистрация'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/Account/sign_up.blade.php ENDPATH**/ ?>