<div class="card-header">
    <h4>Изменить информацию</h4>
</div>
<div class="card-body">
    <form method="post" action="<?php echo e(route('change_info_save')); ?>">
        <?php echo csrf_field(); ?>
    <dl class="dl-horizontal">
        <dt>Фамилия</dt>
        <dd><input name="surname" class="form-control" placeholder="Иванов"/></dd>
        <dt>Имя</dt>
        <dd><input name="name" class="form-control" placeholder="Иван"/></dd>
        <dt>Отчество</dt>
        <dd><input name="second_name" class="form-control" placeholder="Иванович"/></dd>
        <dt>Дата рождения</dt>
        <dd><input type="date" name="date" id="date" max="<?php echo e(date('Y')-16); ?>-12-31" class="form-control"/></dd>
        <dt>Номер телефона</dt>
        <dd class="d-flex align-items-center"><div>+375</div><input id="tel" name="tel_number" class="ms-2 form-control" placeholder="335682439"/></dd>
        <dt>Пол</dt>
        <dd class="d-flex justify-content-around align-items-center">
            <input name="sex" type="radio" class="btn-check" id="option1" autocomplete="off" value="Мужской">
            <label style="width: 40%" class="btn btn-primary" for="option1">Мужской</label>
            <input name="sex" type="radio" class="ml-1 btn-check" id="option2" autocomplete="off" value="Женский">
            <label style="width: 40%" class="btn btn-primary" for="option2">Женский</label>
        </dd>
        <div class="row">
            <input type="submit" id="sub" value="Потвердить" class="btn btn-primary" />
        </div>
    </dl>
    </form>
</div>
<?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/partial/user/change_info_user.blade.php ENDPATH**/ ?>