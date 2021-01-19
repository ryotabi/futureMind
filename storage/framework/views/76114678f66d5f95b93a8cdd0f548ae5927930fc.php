<?php $__env->startSection('content'); ?>
    <main>
        <div class="bg_line top primary_color"></div>
        <div class="bg_line center primary_color"></div>
        <div class="bg_line bottom primary_color"></div>
        <div class="main_wrap">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <a href="<?php echo e(route('diagnosis.self')); ?>"><h2 class="self_color">自己分析</h2></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <a href="<?php echo e(route('diagnosis.future')); ?>"><h2 class="future_color">理想分析</h2></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/diagnosis/index.blade.php ENDPATH**/ ?>