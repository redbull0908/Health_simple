<?php $__env->startSection('content'); ?>



<!-- Start Hero -->
<section
    class="relative table w-full py-36 lg:py-64 bg-[url('../../assets/images/hospital/bg.jpg')] bg-no-repeat bg-center">
    <div class="absolute inset-0 bg-black opacity-75"></div>
    <div class="container">
        <div class="grid grid-cols-1 mt-10">
            <img src="<?php echo e(asset('image/icon/logo-icon-40.png')); ?>" alt="">

            <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6 mt-3">Медицинский центр</h1>
            <p class="text-white/60 text-lg max-w-xl">Диагностика и лечение осуществляются высококвалифицированными специалистами с использованием современного оборудования.</p>


            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user')): ?>
                <div class="mt-8">
                    <a href="<?php echo e(Auth::check() ? route('subscribe') : route('register')); ?>"
                       class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">Записаться на прием</a>
                </div>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <div class="mt-8">
                    <a href="<?php echo e(Auth::check() ? route('subscribe') : route('register')); ?>"
                       class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">Записаться на прием</a>
                </div>
            <?php endif; ?>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<div class="relative">
    <div
        class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
        <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->

<!-- FEATURES START -->
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="flex justify-center">
            <div
                class="relative z-2 transition-all duration-500 ease-in-out sm:-mt-[200px] -mt-[140px] m-0 lg:w-10/12 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md p-6">
                <div class="grid md:grid-cols-3 grid-cols-1 gap-[24px]">
                    <div class="">
                        <div
                            class="w-16 h-16 bg-indigo-600/5 text-indigo-600 rounded-lg text-2xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800">
                            <i class="uil uil-clinic-medical"></i>
                        </div>

                        <div class="content mt-6">
                            <h5 class="text-lg font-medium">Наш адрес</h5>
                            <p class="text-slate-400 mt-3">Беларусь, г. Гомель<br>ул. пр-т Речицкий 69</p>

                            <div class="mt-5">
                                <a href="https://yandex.ru/map-widget/v1/?um=constructor%3Aa1092d34b18b04ff6f9c6b5a2e2277807cf92d14b8ccbb9868728f8ea7d96703&amp;source=constructor"
                                   data-type="iframe" class="video-play-icon read-more lightbox btn btn-link text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Показать на карте</a>
                            </div>
                        </div>
                    </div>
                    <!--end feature content-->

                    <div class="">
                        <div
                            class="w-16 h-16 bg-indigo-600/5 text-indigo-600 rounded-lg text-2xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800">
                            <i class="uil uil-medkit"></i>
                        </div>

                        <div class="content mt-6">
                            <h5 class="text-lg font-medium">Контактные телефоны</h5>
                            <ul class="list-none mt-3">
                                <li class="flex justify-start">
                                    <p class="text-slate-400 mr-6">МТС</p>
                                    <a href="tel:+375336962909" class="btn btn-link text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">+375 33 696 29 09</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end feature content-->

                    <div class="">
                        <div
                            class="w-16 h-16 bg-indigo-600/5 text-indigo-600 rounded-lg text-2xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800">
                            <i class="uil uil-clock"></i>
                        </div>

                        <div class="content mt-6">
                            <h5 class="text-lg font-medium">Время работы</h5>
                            <ul class="list-none mt-3">
                                <li class="flex justify-start">
                                    <p class="text-slate-400 mr-6">Ежедневно</p>
                                    <p class="text-indigo-600">8.00 - 20.00</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end feature content-->
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container md:mt-24 mt-16">
        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
            <div class="md:col-span-5">
                <div class="relative">
                    <img src="<?php echo e(asset('image/bg/about-3.jpg')); ?>" class="rounded-md" alt="">
                </div>
            </div><!--end col-->

            <div class="md:col-span-7">
                <div class="lg:ml-4">
                    <h4 class="mb-6 md:text-3xl text-2xl lg:leading-normal leading-normal font-medium">О нас</h4>
                    <p class="text-slate-400 max-w-xl">Медицинский центр постоянно расширяет перечень оказываемых услуг. Врачи нашего центра регулярно повышают уровень своей квалификации в ведущих научно-практических центрах республики и за рубежом.
                    </p>
                    <p class="text-slate-400 max-w-xl mt-3">
                        Современные технологии и методики, квалифицированный медицинский персонал, дружелюбный сервис, комфортабельные кабинеты — медцентр
                        объединил в себе все необходимое для качественного обследования и лечения пациентов.
                    </p>
                </div>
            </div><!--end col-->
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container md:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Наши услуги</h3>

            <p class="text-slate-400 max-w-xl mx-auto">Консультативный прием ведут врачи высокой квалификации различных специальностей.</p>
        </div><!--end grid-->

        <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 mt-8 gap-[30px]">

            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="text-center md:px-6">
                    <div
                        class="w-20 h-20 bg-indigo-600/5 text-indigo-600 rounded-3xl text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                        <?php switch($service->name):
                            case ('Онкология'): ?>
                                <i class="uil uil-atom"></i>
                                <?php break; ?>
                            <?php case ('Офтальмология'): ?>
                                <i class="uil uil-eye"></i>
                                <?php break; ?>
                            <?php case ('Урология'): ?>
                                <i class="uil uil-medkit"></i>
                                <?php break; ?>
                            <?php case ('Гинекология'): ?>
                                <i class="uil uil-hospital"></i>
                                <?php break; ?>
                            <?php case ('Лабораторная диагностика'): ?>
                                <i class="uil uil-syringe"></i>
                                <?php break; ?>
                            <?php case ('Узи'): ?>
                                <i class="uil uil-microscope"></i>
                                <?php break; ?>
                        <?php endswitch; ?>
                    </div>
                    <div class="content mt-7">
                        <a href="<?php echo e(route('service',['name'=>$service->url_name])); ?>" class="title h5 text-lg font-medium hover:text-indigo-600"><?php echo e($service->name); ?></a>
                        <p class="text-slate-400 mt-3"><?php echo e($service->description); ?>

                        </p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<!-- Start doctors-->
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Наши специалисты
            </h3>
        </div><!--end grid-->

        <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">

            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="lg:col-span-3 md:col-span-6">
                    <div class="p-6 rounded-md border border-gray-100 group bg-white">
                        <img src="<?php echo e(asset('storage/'.$doctor->img)); ?>" class="h-28 m-auto rounded-full shadow-md"
                             alt="">

                        <div class="content mt-4 text-center">

                            <h1 class="mb-4 leading-normal font-semibold"><?php echo e($doctor->full_name); ?></h1>
                            <span class="text-slate-400 block"><?php echo e($doctor->specialization); ?></span>

                            <p class="text-slate-400 mt-4">Категория: <?php echo e($doctor->category); ?></p>
                            <span class="text-slate-400 block">Опыт работы: <?php echo e($doctor->experience); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End doctors-->

<!-- Start statistic -->
<section class="relative md:py-24 py-16 md:pt-0 pt-0">
    <div class="container">
        <div class="grid grid-cols-1 justify-center">
            <div class="relative z-1">
                <div class="grid lg:grid-cols-12 grid-cols-1 md:text-left text-center justify-center">
                    <div class="lg:col-start-2 lg:col-span-10">
                        <div class="relative">
                            <img src="<?php echo e(asset('image/bg/about-4.jpg')); ?>" class="rounded-md shadow-lg" alt="">
                        </div>
                    </div>
                </div>
                <div class="content md:mt-8">
                    <div class="grid lg:grid-cols-12 grid-cols-1 md:text-left text-center justify-center">
                        <div class="lg:col-start-2 lg:col-span-10">
                            <div class="grid md:grid-cols-3 grid-cols-1 items-center">

                                <div class="counter-box text-center">
                                    <h1 class="text-white text-4xl font-semibold mb-2"><span class="counter-value"
                                                                                             data-target="99">10</span>%</h1>
                                    <h5 class="counter-head text-white text-lg font-semibold mb-2">Положительных отзывов
                                    </h5>
                                    <p class="text-white/50">О врачах</p>
                                </div><!--end counter box-->


                                <div class="counter-box text-center">
                                    <h1 class="text-white text-4xl font-semibold mb-2"><span class="counter-value"
                                                                                             data-target="10">2</span>+</h1>
                                    <h5 class="counter-head text-white text-lg font-semibold mb-2">Опыт работы Клиники</h5>
                                    <p class="text-white/50">Лет</p>
                                </div><!--end counter box-->


                                <div class="counter-box text-center">
                                    <h1 class="text-white text-4xl font-semibold mb-2"><span class="counter-value"
                                                                                             data-target="1251">95</span>+</h1>
                                    <h5 class="counter-head text-white text-lg font-semibold mb-2">Обратной связи</h5>
                                    <p class="text-white/50">На ваши вопросы</p>
                                </div><!--end counter box-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row -->
    </div><!--end container-->

    <div class="absolute bottom-0 left-0 right-0 sm:h-2/3 h-4/5 bg-gradient-to-b from-indigo-500 to-indigo-600">
    </div>
</section><!--end section-->
<!-- End statistic-->

<!-- Start  feedback-->



































































































































































<!-- End feedback-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index' ,['title'=>'Здоровье - просто'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/main.blade.php ENDPATH**/ ?>