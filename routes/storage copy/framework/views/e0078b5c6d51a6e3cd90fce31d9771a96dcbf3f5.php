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
            <div class="companyProfile_title">プロフィール編集</div>
            <div class="singleCompany_content mt-0">
                <div class="container">
                    <div class="row">
                        <div class="company_chart col-md-6">
                            <canvas id="companyChart" width="60%" height="40%"></canvas>
                        </div>
                        <div class="col-md-6  company_details">
                            <form action="<?php echo e(route('company.update')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                <div class="text-center">
                                    <img class="company_logo company_admin" src="/storage/images/<?php echo e($items->company_icon); ?>" alt="">
                                </div>
                                <div class="text-center mb-10"><input type="file" name="company_icon"></div>
                                <div class="company_info company_edit">
                                    <ul>
                                        <li><label for="company">企業名</label>：<input type="text" id="company" name="name" value="<?php echo e($items->name); ?>"></li>
                                        <li><label for="industry">業界</label>：<input type="text" id="industry" name="industry" value="<?php echo e($items->industry); ?>"></li>
                                        <li><label for="office">場所</label>：<input type="text" id="office" name="office" value="<?php echo e($items->office); ?>"></li>
                                        <li><label for="employee">社員数</label>：約<input type="text" id="employee" name="employee" value="<?php echo e($items->employee); ?>">人</li>
                                        <li><label for="homepage">ホームページ</label>：<input type="text" id="homepage" name="homepage" value="<?php echo e($items->homepage); ?>"></li>
                                        <li><label for="comment">企業からのコメント</label><br>
                                            <textarea type="text" id="comment" name="comment" style="width:100%;"><?php echo e($items->comment); ?></textarea>
                                        </li> 
                                    </ul>
                                </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="toEdit_btn">更新</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\futureMind\resources\views/Company/edit.blade.php ENDPATH**/ ?>