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
                    <h1><a href="<?php echo e(route('diagnosis.index')); ?>">FutureMind</a></h1>
                </div>
                <div class="header_nav col-md-7">
                    <nav>
                        <ul>
                        <li><a href="#">理想分析について</a></li>
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
            </div>
        </div>
    </header>
    <?php echo $__env->yieldContent('content'); ?>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/companyChart.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/layouts/company_single.blade.php ENDPATH**/ ?>