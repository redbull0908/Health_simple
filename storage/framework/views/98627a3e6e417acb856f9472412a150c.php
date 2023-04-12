    <div class="card-header">
        <h4>Изменение пароля</h4>
    </div>
    <div class="card-body">
        <form method="post" action="<?php echo e(route('change_pas_save')); ?>">
            <?php echo csrf_field(); ?>
            <dl class="dl-horizontal">
                <?php if($errors->pass->isNotEmpty()): ?>
                    <p class="card-text bg-danger p-1"><?php echo e($errors->pass->get('current_password')); ?></p>
                <?php endif; ?>
                <dd>
                    <input name="current_password" type="password" class="form-control" placeholder="Текущий пароль">
                </dd>
                <dd>
                    <input name="password" type="password" class="form-control" placeholder="Новый пароль">
                </dd>
                <dd>
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Потверждение">
                </dd>
                <div class="row">
                    <input type="submit" class="btn btn-primary" value="Сменить пароль"/>
                </div>
            </dl>
        </form>
    </div>
<?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/partial/user/change_password_user.blade.php ENDPATH**/ ?>