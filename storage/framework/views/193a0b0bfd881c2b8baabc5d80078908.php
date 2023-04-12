<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="d-flex flex-wrap">

    <?php $__currentLoopData = $services_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="card me-4 mt-4 d-flex" style="width: 18rem;">
                <div class="card-header" id="logo">
                    <?php echo e($category->name); ?>

                </div>
                <div class="card-body" id="card_category">
                    <img src="<?php echo e(asset('storage').'/'.($category->img ?? 'uploads/image/no_icon.png')); ?>" class="card-img" alt="not found">
                    <p class="card-text mt-3"><?php echo e($category->description); ?></p>
                    <div class="row">
                        <a class="btn btn-primary" href="<?php echo e(route('service',['id'=> $category->id])); ?>">Подробнее</a>
                    </div>
                </div>
            </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.index' ,['title'=>'Услуги'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/Home/services_category.blade.php ENDPATH**/ ?>