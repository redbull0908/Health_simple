
<?php $__env->startSection('content'); ?>
    <div class="container">
         <form method="post" action="<?php echo e(route('register')); ?>">
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
                    <div class="input-group input-group-sm mt-2">
                        <span class="info col-sm-4 input-group-text">Фамилия</span>
                        <input name="surname" class="form-control" value="<?php echo e(old('surname')); ?>"/>
                        <?php $__errorArgs = ['surname'];
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
                        <div class="input-group input-group-sm mt-2">
                            <span class="info col-sm-4 input-group-text">Имя</span>
                            <input name="name" class="form-control" value="<?php echo e(old('name')); ?>"/>
                            <?php $__errorArgs = ['name'];
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
                        <div class="input-group input-group-sm mt-2">
                            <span class="info col-sm-4 input-group-text">Отчество</span>
                            <input name="second_name" class="form-control" value="<?php echo e(old('secondname')); ?>"/>
                            <?php $__errorArgs = ['second_name'];
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
                    <div class="input-group input-group-sm mt-2">
                        <span class="info col-sm-4 input-group-text">Номер телефона</span>
                        <span id="code" class="col-sm-4 input-group-text">+375</span>
                        <input name="phone_number" class="form-control" value="<?php echo e(old('PhoneNumber')); ?>"/>
                        <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="code1 form-control error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="input-group input-group-sm mt-2">
                        <span class="info col-sm-4 input-group-text">Дата рождения</span>
                        <input type="date" name="date" id="date" max="<?php echo e(date('Y')-16); ?>-12-31" class="form-control"/>
                        <?php $__errorArgs = ['date'];
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

                    <div class="input-group input-group-sm mt-2 mt-2">
                        <span class="info col-sm-4 input-group-text">Пол</span>
                        <input name="sex" type="radio" class="btn-check" id="option1" autocomplete="off" value="Мужской">
                        <label class="btn btn-primary m-3" for="option1">Мужской</label>
                        <input name="sex" type="radio" class="ml-1 btn-check" id="option2" autocomplete="off" value="Женский">
                        <label class="btn btn-primary m-3" for="option2">Женский</label>
                        <?php $__errorArgs = ['sex'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="sex_error form-control error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="input-group input-group-sm form-group mt-2">
                        <span class="info col-sm-4 input-group-text">Пароль</span>
                        <input type="password" name="Password" class="form-control" />
                        <div class="icon_pas"></div>
                        <?php $__errorArgs = ['Password'];
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
                        <span class="info col-sm-4 input-group-text">Потверждение пароля</span>
                        <input type="password" name="Password_confirmation" class="form-control" />
                        <?php $__errorArgs = ['Password_confirmation'];
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
                    <br />
                    <div class="form-group">
                        <input type="submit" value="Зарегистрироваться" class="btn btn-primary" />
                    </div>
                    </div>
                </form>

        <?php if(old('sex')=='Мужской'): ?>
            <script>
                document.forms[0].option1.checked = true
            </script>
        <?php endif; ?>
        <?php if(old('sex')=='Женский'): ?>
            <script>
                document.forms[0].option2.checked = true
            </script>
        <?php endif; ?>
        <?php if(old('date')!=null): ?>
            <script>
                let a = '<?php echo e(old('date')); ?>';
                document.getElementById('date').valueAsDate = new Date(a);
            </script>
        <?php endif; ?>
    </div>
    <script>
        let input_pas = document.getElementsByName('Password')[0];
        let input_conf = document.getElementsByName('Password_confirmation')[0];
        document.getElementsByClassName('icon_pas')[0].addEventListener('click',function(){
            if(input_pas.type == 'password'){
                input_pas.type = 'text';
                input_conf.type = 'text';
            }
            else{
                input_pas.type = 'password';
                input_conf.type = 'password';
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index' ,['title'=>'Регистрация'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/Account/register.blade.php ENDPATH**/ ?>