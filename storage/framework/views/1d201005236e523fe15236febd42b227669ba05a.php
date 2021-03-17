<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>FutureMind</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>
<body>
<header>
        <div class="container">
            <div class="row">
                <div class="header_logo col-md-3">
                    <h1>
                        <a href="<?php echo e(route('diagnosis.index')); ?>">FutureMind</a>
                        <span class="hum_btn"><i class="fas fa-bars"></i></span>
                        <span class="hum_close"><i class="fas fa-times"></i></span>
                    </h1>
                </div>
                <div class="header_nav col-md-7">
                    <nav>
                        <ul>
                            <li><a href="<?php echo e(route('diagnosis.about')); ?>">FutureMindについて</a></li>
                            <li><a href="<?php echo e(route('diagnosis.result')); ?>">結果を見る</a></li>
                            <li><a href="<?php echo e(route('search.search')); ?>">企業を探す</a></li>
                            <li><a href="<?php echo e(route('user.likes')); ?>">お気に入り企業を見る</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header_icon col-md-2">
                    <div>
                        <span><a href="<?php echo e(route('user.index')); ?>"><i class="far fa-user"></i></a></span>
                    </div>
                </div>
                <div class="hum_wrap">
                    <nav>
                        <ul>
                            <li><a href="<?php echo e(route('diagnosis.about')); ?>">FutureMindについて</a></li>
                            <li><a href="<?php echo e(route('diagnosis.result')); ?>">結果を見る</a></li>
                            <li><a href="<?php echo e(route('search.search')); ?>">企業を探す</a></li>
                            <li><a href="<?php echo e(route('user.likes')); ?>">お気に入り企業を見る</a></li>
                            <li><a href="<?php echo e(route('user.index')); ?>">プロフィール</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <?php echo $__env->yieldContent('content'); ?>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/layouts/layout.blade.php ENDPATH**/ ?>