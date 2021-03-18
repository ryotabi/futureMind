<?php $__env->startSection('content'); ?>
    <main>
        <div class="companyList_wrap">
            <div class="container">
            <h3 class="companyList_title primary_title">お気に入りをされた学生</h3>
            <div class="companies">
                <div class="row">
                <?php if(!$likeUsers->isEmpty()): ?>
                    <?php $__currentLoopData = $likeUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <a  href="<?php echo e(route('company.singleStudent',['id'=>$user->id])); ?>"><img class="company_logo primary_border" src="storage/images/<?php echo e($user->img_name); ?>" alt=""></a>
                        <p class="company_name"><?php echo e($user->name); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="text-center" style="width:100%;">
                    <p style="font-size:25px; font-weight:bold;">お気に入りに入れた学生はまだいません</p>
                </div>
                <?php endif; ?>
                </div>
            </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.company_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/Company/student.blade.php ENDPATH**/ ?>