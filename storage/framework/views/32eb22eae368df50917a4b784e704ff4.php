<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('image/icon/favicon.png')); ?>" type="image/png">
    <!-- Css -->
    <link href="<?php echo e(asset("css/tiny-slider.css")); ?>" rel="stylesheet">
    <link href="<?php echo e(asset("css/tobii.min.css")); ?>" rel="stylesheet">
    <!-- Main Css -->
    <link href="<?php echo e(asset("css/line.css")); ?>" rel="stylesheet">
    <link href="<?php echo e(asset("css/icons.css")); ?>" rel="stylesheet">
    <link href="<?php echo e(asset("css/tailwind.css")); ?>" rel="stylesheet">
    <title><?php echo e($title); ?></title>
</head>

<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">

<?php echo $__env->yieldContent('content'); ?>

<!-- JAVASCRIPTS -->
<script src="<?php echo e(asset("js/tiny-slider.js")); ?>"></script>
<script src="<?php echo e(asset("js/tobii.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/feather.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/plugins.init.js")); ?>"></script>
<script src="<?php echo e(asset("js/app.js")); ?>"></script>
<!-- JAVASCRIPTS -->
</body>

</html>
<?php /**PATH E:\PHP\OSPanel\domains\Health-Test\resources\views/layouts/auth.blade.php ENDPATH**/ ?>