<?php $__env->startSection('content'); ?>
    <!-- Start Hero -->
    <section class="relative table w-full py-36 lg:py-44 bg-no-repeat bg-center" style="background-image: url(<?php echo e(asset('storage/'.$category->img), false); ?>)">
        <div class="absolute inset-0 bg-black opacity-75"></div>
        <div class="container">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="mt-2 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white"><?php echo e($category->name, false); ?></h3>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
            <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
                <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="<?php echo e(route('main'), false); ?>">health-simple</a></li>
                <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="<?php echo e(route('services'), false); ?>">services</a></li>
                <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">
                    <?php echo e($category->url_name, false); ?></li>
            </ul>
        </div>
    </section><!--end section-->
    <div class="relative">
        <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
            <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End Hero -->

    <!-- Start Section-->
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="flex flex-wrap justify-center">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                    <div class="md:flex mt-6">
                        <div class="md:px-3">
                            <div class="flex items-center mb-4 justify-between">
                                <h5 class="text-xl font-semibold"><?php echo e($category->name, false); ?></h5>
                            </div>

                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="pt-4 border-t border-gray-100 dark:border-gray-700">
                                    <p class="text-[18px] font-semibold mb-1"><?php echo e($service->name, false); ?></p>

                                    <ul class="list-none">
                                        <li class="flex justify-between">
                                            <p class="text-green-600">Цена</p>
                                            <p class="text-green-600"><?php echo e($service->price, false); ?> руб.</p>
                                        </li>
                                    </ul>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
        </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index' ,['title'=>$category->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/Home/service.blade.php ENDPATH**/ ?>