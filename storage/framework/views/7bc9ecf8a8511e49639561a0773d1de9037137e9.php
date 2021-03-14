<?php $__env->startSection('content'); ?>
<main>
        <?php if(isset($chartCompanyData[0])): ?>
        <span id="js_company_developmentValue" data-companydevelopmentvalue="<?php echo e($chartCompanyData[0]); ?>"></span>
        <span id="js_company_socialValue" data-companysocialvalue="<?php echo e($chartCompanyData[1]); ?>"></span>
        <span id="js_company_stableValue" data-companystablevalue="<?php echo e($chartCompanyData[2]); ?>"></span>
        <span id="js_company_teammateValue" data-companyteammatevalue="<?php echo e($chartCompanyData[3]); ?>"></span>
        <span id="js_company_futureValue" data-companyfuturevalue="<?php echo e($chartCompanyData[4]); ?>"></span>
        <?php endif; ?>
        <div class="singleCompany_wrap">
            <div class="companyProfile_title">プロフィール</div>
            <p class="companyProfile_text">（以下の情報が企業データとして記載されます）</p>
            <div class="singleCompany_content mt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 company_chart">
                            <canvas id="companyChart" width="60%" height="40%"></canvas>
                        </div>
                        <div class="col-xl-6 company_details">
                            <div class="text-center">
                                <img class="company_logo" src="/storage/images/<?php echo e($items->company_icon); ?>" alt="">
                            </div>
                            <div class="company_info">
                                <ul>
                                    <li>企業名：<?php echo e($items->name); ?></li>
                                    <li>業界：<?php echo e($items->industry); ?></li>
                                    <li>場所：<?php echo e($items->office); ?></li>
                                    <li>社員数：<?php echo e($items->employee); ?>人</li>
                                    <li>ホームページ：<?php echo e($items->homepage); ?></li>
                                    <li class="company_comment">企業からのコメント<br><?php echo e($items->comment); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo e(route('company.edit')); ?>" class="toEdit_btn">編集</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/Company/index.blade.php ENDPATH**/ ?>