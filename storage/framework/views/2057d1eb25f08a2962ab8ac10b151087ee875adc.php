<?php $__env->startSection('content'); ?>
    <main>
        <span id="js_future_developmentValue" data-futuredevelopmentvalue="<?php echo e($chartFutureData[0]); ?>"></span>
        <span id="js_future_socialValue" data-futuresocialvalue="<?php echo e($chartFutureData[1]); ?>"></span>
        <span id="js_future_stableValue" data-futurestablevalue="<?php echo e($chartFutureData[2]); ?>"></span>
        <span id="js_future_teammateValue" data-futureteammatevalue="<?php echo e($chartFutureData[3]); ?>"></span>
        <span id="js_future_futureValue" data-futurefuturevalue="<?php echo e($chartFutureData[4]); ?>"></span>
        <span id="js_self_developmentValue" data-selfdevelopmentvalue="<?php echo e($chartSelfData[0]); ?>"></span>
        <span id="js_self_socialValue" data-selfsocialvalue="<?php echo e($chartSelfData[1]); ?>"></span>
        <span id="js_self_stableValue" data-selfstablevalue="<?php echo e($chartSelfData[2]); ?>"></span>
        <span id="js_self_teammateValue" data-selfteammatevalue="<?php echo e($chartSelfData[3]); ?>"></span>
        <span id="js_self_futureValue" data-selffuturevalue="<?php echo e($chartSelfData[4]); ?>"></span>
        <div class="result_wrap">
        <h3 class="diagnosis_title primary_title">分析結果</h3>
        <div class="result_content">
            <div class="container">
                <div class="row">
                    <div class="result_chart">
                        <canvas id="resultChart" width="60%" height="40%"></canvas>
                    </div>
                    <div class="result_text">
                        <div class="result_tabs">
                            <div class="result_tab self_tab checked"><span >今の自分</span></div>
                            <div class="result_tab future_tab"><span >理想の自分</span></div>
                            <div class="result_tab want_tab"><span>なりたい自分へ</span></div>
                        </div>
                        <div class="self_text content_wrap active">
                            <div class="text_wrap">
                                <h3 class="text_title">今の自分</h3>
                                <h4><?php echo e($selfCommentData->comment_type); ?></h4>
                                <p class="text_content">
                                    <?php echo e($selfCommentData->comment); ?>

                                </p>
                                <h4 style="margin-top:30px;"><?php echo e($selfCommentData_sec->comment_type); ?></h4>
                                <p class="text_content">
                                    <?php echo e($selfCommentData_sec->comment); ?>

                                </p>
                            </div>
                            <div class="result_btn_wrap">
                                <a href="<?php echo e(route('diagnosis.selfCompany')); ?>" class="result_btn self_btn"><span>オススメの企業</span></a>
                            </div>
                        </div>
                        <div class="future_text content_wrap">
                            <div class="text_wrap">
                                <h3 class="text_title">理想の自分</h3>
                                <h4><?php echo e($futureCommentData->comment_type); ?></h4>
                                <p class="text_content">
                                    <?php echo e($futureCommentData->comment); ?>

                                </p>
                            </div>
                            <div class="result_btn_wrap">
                                <a href="<?php echo e(route('diagnosis.futureCompany')); ?>" class="result_btn future_btn"><span>オススメの企業</span></a>
                            </div>
                        </div>
                        <div class="gap_text content_wrap">
                            <div class="text_wrap">
                                <h3 class="text_title">理想の自分へ</h3>
                                <p class="text_content">
                                <?php echo e($toFutureCommentData->comment); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/diagnosis/result.blade.php ENDPATH**/ ?>