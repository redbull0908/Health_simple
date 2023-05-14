<?php $__env->startSection('content'); ?>
<!-- Start Hero -->
<section class="relative table w-full py-36 lg:py-44 bg-[url('../../assets/images/team.jpg')] bg-no-repeat bg-center">
    <div class="absolute inset-0 bg-black opacity-75"></div>
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="mb-6 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Наши Врачи</h3>
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

    <div class="container md:mt-8 mt-6">
        <div class="flex flex-wrap">
            <a href="" class="m-auto mt-2 w-[320px] active-btn text-[12px] btn bg-emerald-600 hover:bg-indigo-600 border-0 text-white">Все</a>
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="" class="m-auto mt-2 w-[320px] text-[12px] btn bg-emerald-600 hover:bg-indigo-600 border-0 text-white"><?php echo e($item->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!--end grid-->

        <div id="doctors" class="grid md:grid-cols-12 grid-cols-1 items-center mt-8 gap-[30px]">
            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="<?php echo e($doctor->name); ?> lg:col-span-4 md:col-span-6">
                <div class="team p-6 rounded-md shadow-md dark:shadow-gray-800 dark:border-gray-700 bg-white dark:bg-slate-900 relative">
                    <div class="absolute inset-0 bg-indigo-600/10 dark:bg-indigo-600/30 rounded-md -mt-[10px] -ml-[10px] h-[98%] w-[98%] -z-1"></div>
                    <img src="<?php echo e(asset('storage/'.$doctor->img)); ?>" class="h-[320px] m-auto rounded-3xl shadow-md dark:shadow-gray-800" alt="">

                    <div class="content mt-4 text-center">
                        <h1 class="mb-4 leading-normal font-semibold"><?php echo e($doctor->full_name); ?></h1>
                        <span class="text-slate-400 block"><?php echo e($doctor->specialization); ?></span>
                        <p class="text-slate-400">Категория: <?php echo e($doctor->category); ?></p>
                        <p class="text-slate-400 mb-4">Опыт работы: <?php echo e($doctor->experience); ?></p>
                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user')): ?>
                        <?php if(!Auth::check()): ?>
                            <a href="<?php echo e(route('register')); ?>" class="w-full text-[12px] btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">Записаться на прием</a>
                        <?php else: ?>
                            <form method="post" action="<?php echo e(route('subscribe_doc')); ?>">
                                <?php echo csrf_field(); ?>
                                <input name="id" class="hidden" type="text" value="<?php echo e($doctor->id); ?>">
                                <input type="submit" class="w-full text-[12px] btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md" value="Записаться на прием">
                            </form>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div><!--end container-->
</section><!--end section-->
<script>
    let arr = document.getElementsByClassName('bg-emerald-600');
    for (let i = arr.length - 1; i >= 0; i--) {
        arr[i].addEventListener('click',function (e){
            e.preventDefault();

            let doctors = document.getElementsByClassName(e.target.innerText);

            let content = document.getElementById('doctors').children

            for (let i = content.length - 1; i >= 0; i--){
                content[i].classList.add('hidden');
            }

            for (let i = doctors.length - 1; i >= 0; i--){
                doctors[i].classList.remove('hidden');
            }
            let list = document.getElementsByClassName('active-btn');
            for (let i = list.length - 1; i >= 0; i--){
                list[i].classList.remove('active-btn');
            }
            e.target.classList.add('active-btn');

            if(e.target.innerText == 'Все'){
                for (let i = content.length - 1; i >= 0; i--){
                    content[i].classList.remove('hidden');
                }
            }
    })}
</script>
<!-- End Section-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index' ,['title'=>'Врачи'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/Home/doctors.blade.php ENDPATH**/ ?>