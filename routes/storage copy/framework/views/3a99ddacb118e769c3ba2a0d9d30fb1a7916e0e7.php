<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FutureMind</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>
<body>
<header>
        <div class="container">
            <div class="row">
                <div class="header_logo col-md-3">
                    <h1><a href="<?php echo e(route('company-home')); ?>">FutureMind</a></h1>
                </div>
                <div class="header_nav col-md-7">
                    <nav>
                        <ul>
                            <li><a href="<?php echo e(route('company.diagnosis')); ?>">診断をする</a></li>
                            <li><a href="<?php echo e(route('company.student')); ?>">学生を見る</a></li>
                            <li><a href="#">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header_icon col-md-2">
                    <div>
                        <span><a href="<?php echo e(route('company-home')); ?>"><i class="far fa-user"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php echo $__env->yieldContent('content'); ?>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/companyChart.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/layouts/company_header.blade.php ENDPATH**/ ?>