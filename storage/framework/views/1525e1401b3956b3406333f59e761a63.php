<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="lg:col-span-3 md:col-span-6">
        <div class="team p-6 rounded-md shadow-md dark:shadow-gray-800 dark:border-gray-700 bg-white dark:bg-slate-900 relative">
            <div class="absolute inset-0 bg-indigo-600/10 dark:bg-indigo-600/30 rounded-md -mt-[10px] -ml-[10px] h-[98%] w-[98%] -z-1"></div>
            <img src="<?php echo e(asset('storage/'.$doctor->img)); ?>" class="h-[320px] m-auto rounded-3xl shadow-md dark:shadow-gray-800" alt="">

            <div class="content mt-4 text-center">
                
                <h1 class="mb-4 leading-normal font-semibold"><?php echo e($doctor->full_name); ?></h1>
                <span class="text-slate-400 block"><?php echo e($doctor->specialization); ?></span>
                <p class="text-slate-400 mb-4">Опыт работы: <?php echo e($doctor->experience); ?></p>
                <a href="" class="w-full text-[12px] btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">Записаться на прием</a>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/Home/partial/doctors.blade.php ENDPATH**/ ?>