<?php $__env->startSection('content'); ?>
<!-- Start Hero -->
<section class="relative table w-full py-36 lg:py-44 bg-[url('../../assets/images/team.jpg')] bg-no-repeat bg-center">
    <div class="absolute inset-0 bg-black opacity-75"></div>
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="mb-6 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Наши Врачи</h3>

            <p class="text-slate-300 text-lg max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
            <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="#">Health-simple</a></li>
            <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">doctors</li>
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
        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
            <div class="lg:col-span-5 md:col-span-6">
                <div class="grid grid-cols-12 gap-6 items-center">
                    <div class="col-span-6">
                        <div class="grid grid-cols-1 gap-6">
                            <img src="assets/images/about/ab03.jpg" class="shadow rounded-md" alt="">
                            <img src="assets/images/about/ab02.jpg" class="shadow rounded-md" alt="">
                        </div>
                    </div>

                    <div class="col-span-6">
                        <div class="grid grid-cols-1 gap-6">
                            <img src="assets/images/about/ab01.jpg" class="shadow rounded-md" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 md:col-span-6">
                <div class="lg:ml-5">
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Who we are ?</h3>

                    <p class="text-slate-400 max-w-xl">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect. Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with 'real' content.</p>

                    <div class="mt-6">
                        <a href="#" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mr-2 mt-2"><i class="uil uil-envelope"></i> Contact us</a>
                    </div>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container md:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Our Professional Team</h3>

            <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
        </div><!--end grid-->

        <div class="grid md:grid-cols-12 grid-cols-1 items-center mt-8 gap-[30px]">
            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="lg:col-span-3 md:col-span-6">
                <div class="team p-6 rounded-md shadow-md dark:shadow-gray-800 dark:border-gray-700 bg-white dark:bg-slate-900 relative">
                    <div class="absolute inset-0 bg-indigo-600/10 dark:bg-indigo-600/30 rounded-md -mt-[10px] -ml-[10px] h-[98%] w-[98%] -z-1"></div>
                    <img src="<?php echo e(asset('storage/'.$doctor->img)); ?>" class="h-[320px] m-auto rounded-3xl shadow-md dark:shadow-gray-800" alt="">

                    <div class="content mt-4 text-center">
                        <a href="" class="mb-1 text-lg font-medium hover:text-indigo-600 block"><?php echo e($doctor->full_name); ?></a>
                        <span class="text-slate-400 block"><?php echo e($doctor->specialization); ?></span>
                        <p class="text-slate-400 mb-4">Опыт работы: <?php echo e($doctor->experience); ?></p>
                        <a href="" class="w-full text-[12px] btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">Записаться на прием</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div><!--end container-->

    <div class="container md:mt-24 mt-16">
        <div class="grid grid-cols-1 text-center">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Have Question ? Get in touch!</h3>

            <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>

            <div class="mt-6">
                <a href="#" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mr-2 mt-2"><i class="uil uil-phone"></i> Contact us</a>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Section-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index' ,['title'=>'Врачи'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/Home/doctors.blade.php ENDPATH**/ ?>