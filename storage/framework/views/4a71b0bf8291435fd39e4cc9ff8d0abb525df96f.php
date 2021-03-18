<?php $__env->startSection('content'); ?>
    <main>
        <div class="companyList_wrap">
            <div class="container">
            <h3 class="companyList_title primary_title">検索結果</h3>
            <div class="companies">
                <div class="row">
                <?php if(!$companies->isEmpty()): ?>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <a  href="<?php echo e(route('search.single',['id'=>$company->id])); ?>"><img class="company_logo primary_border" src="http://s-ryota.sakura.ne.jp/futureMind/storage/images/<?php echo e($company->company_icon); ?>" alt=""></a>
                        <p class="company_name"><?php echo e($company->name); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="text-center" style="width:100%;">
                    <p style="font-size:25px; font-weight:bold;">申し訳ございません。<br>該当の企業は見つかりませんでした。</p>
                    <a href="<?php echo e(route('search.search')); ?>" class="search_btn primary_btn"><span>検索画面</span></a>
                </div>
                <?php endif; ?>
                </div>
                <div class="text-center" style="margin:0 auto; display: table;">
                <?php echo e($companies->appends(request()->input())->links()); ?>

                </div>
            </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/companySearch/result.blade.php ENDPATH**/ ?>