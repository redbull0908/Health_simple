    <div class="card-header">
        <h4>Информация</h4>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Дата создания</dt>
            <dd><?php echo e(\Carbon\Carbon::make(Auth::user()->created_at)->format(' d m Y')); ?></dd>
            <dt>Пол</dt>
            <dd><?php echo e(Auth::user()->sex); ?></dd>
            <dt>Дата рождения</dt>
            <dd><?php echo e(\Carbon\Carbon::make(Auth::user()->birthday)->format(' d m Y')); ?></dd>
            <dt>Номер телефона</dt>
            <dd>+375<?php echo e(Auth::user()->tel_number); ?></dd>
        </dl>
    </div>
<?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/partial/user/info_user.blade.php ENDPATH**/ ?>