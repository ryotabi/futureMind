<?php $__env->startSection('content'); ?>
    <main>
        <div class="user_wrap">
            <div class="container">
                <div class="row row_wrap">
                    <div class="col-md-3 info_wrap">
                        <div class="info_title border_future">
                            <p>志望業界</p>
                        </div>
                        <div class="info_content">
                            <p><?php echo e($user->industry); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 info_wrap">
                        <div class="info_title border_future">
                            <p>氏名</p>
                        </div>
                        <div class="info_content">
                            <p><?php echo e($user->name); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 info_wrap">
                        <div class="info_title border_future">
                            <p>卒業年度</p>
                        </div>
                        <div class="info_content">
                            <p><?php echo e($user->year); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row row_wrap">
                    <div class="col-md-3 info_wrap">
                        <div class="info_title border_future">
                            <p>部活動・サークル</p>
                        </div>
                        <div class="info_content">
                            <p><?php echo e($user->club); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 info_wrap">
                        <div>
                            <img class="info_img" src="/storage/images/<?php echo e($user->img_name); ?>" alt="画像">
                        </div>
                        <div class="toEdit_btn">
                            <a href="<?php echo e(route('company.chat',['student_id'=>$user->id,'id'=>$Room_id])); ?>"><p>チャット</p></a>
                        </div>
                    </div>
                    <div class="col-md-3 info_wrap">
                        <div class="info_title border_self">
                            <p>在学学校</p>
                        </div>
                        <div class="info_content">
                            <p><?php echo e($user->university); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row row_wrap">
                    <div class="col-md-3 info_wrap">
                        <div class="info_title border_self">
                            <p>趣味</p>
                        </div>
                        <div class="info_content">
                            <p><?php echo e($user->hobby); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 info_wrap">
                        <div class="info_title border_self">
                            <p>出身</p>
                        </div>
                        <div class="info_content">
                            <p><?php echo e($user->hometown); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 info_wrap">
                        <div class="info_title border_self">
                            <p>メールアドレス</p>
                        </div>
                        <div class="info_content">
                            <p><?php echo e($user->email); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.company_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/Company/single.blade.php ENDPATH**/ ?>